<?php

declare(strict_types=1);

namespace Panth\OrderAttachments\Controller\Adminhtml\Attachment;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Panth\OrderAttachments\Model\OrderAttachmentFactory;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment as OrderAttachmentResource;
use Psr\Log\LoggerInterface;

class Download extends Action
{
    public const ADMIN_RESOURCE = 'Panth_OrderAttachments::attachment_download';

    public function __construct(
        Context $context,
        private readonly FileFactory $fileFactory,
        private readonly Filesystem $filesystem,
        private readonly OrderAttachmentFactory $attachmentFactory,
        private readonly OrderAttachmentResource $attachmentResource,
        private readonly LoggerInterface $logger
    ) {
        parent::__construct($context);
    }

    /**
     * Execute admin download action
     */
    public function execute(): \Magento\Framework\Controller\ResultInterface|\Magento\Framework\App\ResponseInterface
    {
        try {
            $attachmentId = (int) $this->getRequest()->getParam('id');

            if (!$attachmentId) {
                throw new LocalizedException(__('Attachment ID is required.'));
            }

            $attachment = $this->attachmentFactory->create();
            $this->attachmentResource->load($attachment, $attachmentId);

            if (!$attachment->getId()) {
                throw new LocalizedException(__('Attachment not found.'));
            }

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
            $this->logger->error('OrderAttachments admin download error: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
            $this->messageManager->addErrorMessage(__('An error occurred while downloading the file.'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('panth_orderattachments/attachment/index');
    }
}
