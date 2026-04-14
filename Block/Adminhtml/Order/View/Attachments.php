<?php
/**
 * Copyright © Panth Infotech. All rights reserved.
 * Order Attachments — Admin Order View Block
 */

declare(strict_types=1);

namespace Panth\OrderAttachments\Block\Adminhtml\Order\View;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Registry;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment\CollectionFactory;

class Attachments extends Template
{
    private array $productNameCache = [];

    public function __construct(
        Context $context,
        private readonly Registry $registry,
        private readonly CollectionFactory $collectionFactory,
        private readonly ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get the current order
     *
     * @return \Magento\Sales\Model\Order|null
     */
    public function getOrder()
    {
        return $this->registry->registry('current_order');
    }

    /**
     * Get attachments collection for this order
     *
     * @return \Panth\OrderAttachments\Model\ResourceModel\OrderAttachment\Collection
     */
    public function getAttachments()
    {
        $order = $this->getOrder();
        if (!$order) {
            return $this->collectionFactory->create();
        }

        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('order_id', $order->getId());
        $collection->addFieldToFilter('status', 1);
        $collection->setOrder('created_at', 'DESC');

        return $collection;
    }

    /**
     * Check if order has attachments
     */
    public function hasAttachments(): bool
    {
        return $this->getAttachments()->getSize() > 0;
    }

    /**
     * Get download URL for an attachment
     */
    public function getDownloadUrl(int $attachmentId): string
    {
        return $this->getUrl('orderattachments/attachment/download', [
            'id' => $attachmentId
        ]);
    }

    /**
     * Format file size to human-readable string
     */
    public function formatFileSize(int $bytes): string
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }
        return $bytes . ' B';
    }

    /**
     * Get uploaded-by label (customer name/email or "Guest")
     */
    public function getProductName(int $productId): string
    {
        if (!isset($this->productNameCache[$productId])) {
            try {
                $product = $this->productRepository->getById($productId);
                $this->productNameCache[$productId] = $product->getName();
            } catch (\Exception $e) {
                $this->productNameCache[$productId] = 'Product #' . $productId;
            }
        }
        return $this->productNameCache[$productId];
    }

    public function getProductEditUrl(int $productId): string
    {
        return $this->getUrl('catalog/product/edit', ['id' => $productId]);
    }

    public function getUploadedBy(\Panth\OrderAttachments\Model\OrderAttachment $attachment): string
    {
        $email = $attachment->getCustomerEmail();
        $customerId = $attachment->getCustomerId();

        if ($customerId) {
            return $email ?: __('Customer #%1', $customerId)->render();
        }

        return $email ?: __('Guest')->render();
    }
}
