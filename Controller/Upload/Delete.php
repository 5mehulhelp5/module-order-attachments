<?php

declare(strict_types=1);

namespace Panth\OrderAttachments\Controller\Upload;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\LocalizedException;
use Panth\OrderAttachments\Model\OrderAttachmentFactory;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment as OrderAttachmentResource;
use Psr\Log\LoggerInterface;

class Delete implements HttpPostActionInterface, CsrfAwareActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $jsonFactory,
        private readonly CustomerSession $customerSession,
        private readonly OrderAttachmentFactory $attachmentFactory,
        private readonly OrderAttachmentResource $attachmentResource,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * @inheritDoc
     */
    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }

    /**
     * Execute delete (soft) action
     */
    public function execute(): \Magento\Framework\Controller\Result\Json
    {
        $result = $this->jsonFactory->create();

        try {
            $attachmentId = (int) $this->request->getParam('attachment_id');

            if (!$attachmentId) {
                throw new LocalizedException(__('Attachment ID is required.'));
            }

            $attachment = $this->attachmentFactory->create();
            $this->attachmentResource->load($attachment, $attachmentId);

            if (!$attachment->getId()) {
                throw new LocalizedException(__('Attachment not found.'));
            }

            $this->validateOwnership($attachment);

            $attachment->setData('status', 0);
            $this->attachmentResource->save($attachment);

            return $result->setData([
                'success' => true,
                'message' => __('Attachment has been removed.'),
            ]);
        } catch (LocalizedException $e) {
            return $result->setData([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            $this->logger->error('OrderAttachments delete error: ' . $e->getMessage(), [
                'exception' => $e,
            ]);

            return $result->setData([
                'success' => false,
                'message' => __('An error occurred while removing the attachment.'),
            ]);
        }
    }

    /**
     * Validate the current user owns this attachment
     */
    private function validateOwnership(\Panth\OrderAttachments\Model\OrderAttachment $attachment): void
    {
        // If attachment has an order_id, it's already placed — don't allow delete
        if ($attachment->getData('order_id')) {
            throw new LocalizedException(__('Cannot delete attachments from placed orders.'));
        }

        // Logged-in customer: check customer_id match
        if ($this->customerSession->isLoggedIn()) {
            $customerId = (int) $this->customerSession->getCustomerId();
            $attachmentCustomerId = $attachment->getData('customer_id') ? (int) $attachment->getData('customer_id') : null;
            if ($attachmentCustomerId === $customerId) {
                return;
            }
        }

        // Guest: allow delete if attachment has no customer_id and no order (pre-checkout)
        if (!$attachment->getData('customer_id') && !$attachment->getData('order_id')) {
            return;
        }

        throw new LocalizedException(__('You are not authorized to delete this attachment.'));
    }
}
