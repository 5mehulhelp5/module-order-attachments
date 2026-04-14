<?php
declare(strict_types=1);

namespace Panth\OrderAttachments\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Panth\OrderAttachments\Model\OrderAttachmentFactory;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment as AttachmentResource;
use Psr\Log\LoggerInterface;

class LinkAttachmentsToQuoteItem implements ObserverInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly OrderAttachmentFactory $attachmentFactory,
        private readonly AttachmentResource $attachmentResource,
        private readonly LoggerInterface $logger
    ) {}

    public function execute(Observer $observer): void
    {
        try {
            $quoteItem = $observer->getEvent()->getData('quote_item');
            if (!$quoteItem || !$quoteItem->getId()) {
                return;
            }

            $attachmentIds = $this->request->getParam('order_attachment_ids');
            if (empty($attachmentIds) || !is_array($attachmentIds)) {
                return;
            }

            $filenames = [];
            foreach ($attachmentIds as $attachmentId) {
                $attachment = $this->attachmentFactory->create();
                $this->attachmentResource->load($attachment, (int) $attachmentId);

                if ($attachment->getId() && (int) $attachment->getData('status') === 1) {
                    $attachment->setData('quote_item_id', (int) $quoteItem->getId());
                    $this->attachmentResource->save($attachment);
                    $filenames[] = $attachment->getData('original_filename');
                }
            }

            // Add filenames as additional_options so they show in cart/checkout/order
            if (!empty($filenames)) {
                $additionalOptions = [];
                foreach ($filenames as $i => $filename) {
                    $additionalOptions[] = [
                        'label' => 'Attached File ' . ($i + 1),
                        'value' => $filename,
                    ];
                }

                // Merge with existing additional_options
                $existingOptions = $quoteItem->getOptionByCode('additional_options');
                if ($existingOptions) {
                    $existing = json_decode($existingOptions->getValue(), true) ?: [];
                    $additionalOptions = array_merge($existing, $additionalOptions);
                }

                $quoteItem->addOption([
                    'code' => 'additional_options',
                    'value' => json_encode($additionalOptions),
                    'product_id' => $quoteItem->getProductId(),
                ]);

                $quoteItem->save();
            }
        } catch (\Exception $e) {
            $this->logger->error('OrderAttachments: Error linking to quote item: ' . $e->getMessage());
        }
    }
}
