<?php

declare(strict_types=1);

namespace Panth\OrderAttachments\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment\CollectionFactory as AttachmentCollectionFactory;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment as OrderAttachmentResource;
use Psr\Log\LoggerInterface;

class CopyAttachmentsToOrder implements ObserverInterface
{
    public function __construct(
        private readonly AttachmentCollectionFactory $attachmentCollectionFactory,
        private readonly OrderAttachmentResource $attachmentResource,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * Copy quote item attachments to order items after order placement
     */
    public function execute(Observer $observer): void
    {
        try {
            /** @var Order $order */
            $order = $observer->getEvent()->getData('order');

            if (!$order) {
                return;
            }

            // Build quote_item_id => order_item_id map
            $quoteItemToOrderItem = [];
            foreach ($order->getAllItems() as $orderItem) {
                $quoteItemId = (int) $orderItem->getQuoteItemId();
                if ($quoteItemId) {
                    $quoteItemToOrderItem[$quoteItemId] = (int) $orderItem->getItemId();
                }
            }

            if (empty($quoteItemToOrderItem)) {
                return;
            }

            $quoteItemIds = array_keys($quoteItemToOrderItem);

            // Load all active attachments linked to these quote items
            $collection = $this->attachmentCollectionFactory->create();
            $collection->addFieldToFilter('quote_item_id', ['in' => $quoteItemIds]);
            $collection->addFieldToFilter('status', 1);

            foreach ($collection as $attachment) {
                $quoteItemId = (int) $attachment->getData('quote_item_id');

                if (!isset($quoteItemToOrderItem[$quoteItemId])) {
                    continue;
                }

                $attachment->setData('order_item_id', $quoteItemToOrderItem[$quoteItemId]);
                $attachment->setData('order_id', (int) $order->getId());

                $this->attachmentResource->save($attachment);
            }
        } catch (\Exception $e) {
            $this->logger->error('OrderAttachments: Failed to copy attachments to order.', [
                'exception' => $e,
                'order_id'  => $order->getId() ?? null,
            ]);
        }
    }
}
