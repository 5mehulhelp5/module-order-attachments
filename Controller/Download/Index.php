<?php

declare(strict_types=1);

namespace Panth\OrderAttachments\Controller\Download;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Panth\OrderAttachments\Model\OrderAttachmentFactory;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment as OrderAttachmentResource;
use Psr\Log\LoggerInterface;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly FileFactory $fileFactory,
        private readonly RedirectFactory $redirectFactory,
        private readonly Filesystem $filesystem,
        private readonly CustomerSession $customerSession,
        private readonly OrderRepositoryInterface $orderRepository,
        private readonly OrderAttachmentFactory $attachmentFactory,
        private readonly OrderAttachmentResource $attachmentResource,
        private readonly MessageManagerInterface $messageManager,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * Execute download action
     */
    public function execute(): \Magento\Framework\Controller\ResultInterface|\Magento\Framework\App\ResponseInterface
    {
        try {
            $attachmentId = (int) $this->request->getParam('id');

            if (!$attachmentId) {
                throw new LocalizedException(__('Attachment ID is required.'));
            }

            $attachment = $this->attachmentFactory->create();
            $this->attachmentResource->load($attachment, $attachmentId);

            if (!$attachment->getId() || !(int) $attachment->getData('status')) {
                throw new LocalizedException(__('Attachment not found.'));
            }

            $this->validateAccess($attachment);

            $filePath = $attachment->getData('file_path');
            $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);

            if (!$mediaDirectory->isFile($filePath)) {
                throw new LocalizedException(__('The requested file no longer exists.'));
            }

            $absolutePath = $mediaDirectory->getAbsolutePath($filePath);
            $originalFilename = $attachment->getData('original_filename');
            $mimeType = $attachment->getData('mime_type') ?: 'application/octet-stream';

            return $this->fileFactory->create(
                $originalFilename,
                [
                    'type'  => 'filename',
                    'value' => $absolutePath,
                ],
                DirectoryList::ROOT,
                $mimeType
            );
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->logger->error('OrderAttachments download error: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
            $this->messageManager->addErrorMessage(__('An error occurred while downloading the file.'));
        }

        $redirect = $this->redirectFactory->create();

        return $redirect->setPath('/');
    }

    /**
     * Validate customer can access this attachment
     */
    private function validateAccess(\Panth\OrderAttachments\Model\OrderAttachment $attachment): void
    {
        if (!$this->customerSession->isLoggedIn()) {
            throw new LocalizedException(__('Please log in to download attachments.'));
        }

        $customerId = (int) $this->customerSession->getCustomerId();
        $attachmentCustomerId = $attachment->getData('customer_id')
            ? (int) $attachment->getData('customer_id')
            : null;

        // Check if the customer is the uploader
        if ($attachmentCustomerId !== null && $customerId === $attachmentCustomerId) {
            return;
        }

        // Check if the customer owns the order
        $orderId = $attachment->getData('order_id')
            ? (int) $attachment->getData('order_id')
            : null;

        if ($orderId) {
            try {
                $order = $this->orderRepository->get($orderId);
                if ((int) $order->getCustomerId() === $customerId) {
                    return;
                }
            } catch (\Exception $e) {
                // Order not found, deny access
            }
        }

        throw new LocalizedException(__('You are not authorized to access this attachment.'));
    }
}
