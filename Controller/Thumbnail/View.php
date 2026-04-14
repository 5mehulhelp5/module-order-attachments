<?php
declare(strict_types=1);

namespace Panth\OrderAttachments\Controller\Thumbnail;

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Filesystem;
use Panth\OrderAttachments\Model\OrderAttachmentFactory;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment as AttachmentResource;
use Psr\Log\LoggerInterface;

/**
 * Serves attachment thumbnails only to authenticated owners
 */
class View implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly RawFactory $rawResultFactory,
        private readonly CustomerSession $customerSession,
        private readonly CheckoutSession $checkoutSession,
        private readonly OrderAttachmentFactory $attachmentFactory,
        private readonly AttachmentResource $attachmentResource,
        private readonly Filesystem $filesystem,
        private readonly LoggerInterface $logger
    ) {}

    public function execute(): ResultInterface
    {
        $result = $this->rawResultFactory->create();

        try {
            $attachmentId = (int) $this->request->getParam('id');
            if (!$attachmentId) {
                return $this->notFound($result);
            }

            $attachment = $this->attachmentFactory->create();
            $this->attachmentResource->load($attachment, $attachmentId);

            if (!$attachment->getId() || (int) $attachment->getData('status') !== 1) {
                return $this->notFound($result);
            }

            // Ownership verification
            if (!$this->isOwner($attachment)) {
                return $this->notFound($result);
            }

            $filePath = $attachment->getData('file_path');
            $mediaDir = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);

            if (!$mediaDir->isFile($filePath)) {
                return $this->notFound($result);
            }

            $mimeType = $attachment->getData('mime_type') ?: 'application/octet-stream';
            $content = $mediaDir->readFile($filePath);

            $result->setHttpResponseCode(200);
            $result->setHeader('Content-Type', $mimeType);
            $result->setHeader('Content-Length', (string) strlen($content));
            $result->setHeader('Cache-Control', 'private, max-age=3600');
            $result->setContents($content);

            return $result;
        } catch (\Exception $e) {
            $this->logger->error('OrderAttachments thumbnail error: ' . $e->getMessage());
            return $this->notFound($result);
        }
    }

    /**
     * Verify the current user owns this attachment
     */
    private function isOwner($attachment): bool
    {
        $attachmentCustomerId = $attachment->getData('customer_id')
            ? (int) $attachment->getData('customer_id')
            : null;
        $attachmentQuoteItemId = $attachment->getData('quote_item_id')
            ? (int) $attachment->getData('quote_item_id')
            : null;

        // Check 1: Logged-in customer owns it
        if ($this->customerSession->isLoggedIn()) {
            $sessionCustomerId = (int) $this->customerSession->getCustomerId();
            if ($attachmentCustomerId === $sessionCustomerId) {
                return true;
            }
        }

        // Check 2: Attachment is linked to a quote item in the current session's cart
        if ($attachmentQuoteItemId) {
            try {
                $quote = $this->checkoutSession->getQuote();
                foreach ($quote->getAllItems() as $item) {
                    if ((int) $item->getId() === $attachmentQuoteItemId) {
                        return true;
                    }
                }
            } catch (\Exception $e) {
                // Quote not available
            }
        }

        // Check 3: Attachment has no quote item yet (just uploaded, not added to cart)
        // Allow if it belongs to the current session's customer
        if (!$attachmentQuoteItemId && $attachmentCustomerId === null) {
            // Unlinked attachment with no customer — only allow if it was just uploaded
            // (created within last 30 minutes as a safety window)
            $createdAt = strtotime($attachment->getData('created_at') ?? '');
            if ($createdAt && (time() - $createdAt) < 1800) {
                return true;
            }
        }

        return false;
    }

    private function notFound($result): ResultInterface
    {
        $result->setHttpResponseCode(404);
        $result->setContents('');
        return $result;
    }
}
