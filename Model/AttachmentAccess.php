<?php
declare(strict_types=1);

namespace Panth\OrderAttachments\Model;

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Sales\Api\OrderRepositoryInterface;

class AttachmentAccess
{
    private const SESSION_KEY = 'panth_order_attachment_ids';
    private const SESSION_LIMIT = 200;

    public function __construct(
        private readonly CustomerSession $customerSession,
        private readonly CheckoutSession $checkoutSession,
        private readonly OrderRepositoryInterface $orderRepository
    ) {
    }

    public function rememberUpload(int $attachmentId): void
    {
        if ($attachmentId <= 0) {
            return;
        }
        $ids = $this->getSessionUploadIds();
        $ids[] = $attachmentId;
        $ids = array_values(array_unique($ids));
        if (count($ids) > self::SESSION_LIMIT) {
            $ids = array_slice($ids, -self::SESSION_LIMIT);
        }
        $this->checkoutSession->setData(self::SESSION_KEY, $ids);
    }

    public function getSessionUploadIds(): array
    {
        $ids = $this->checkoutSession->getData(self::SESSION_KEY);
        if (!is_array($ids)) {
            return [];
        }

        return array_values(array_filter(array_map('intval', $ids)));
    }

    public function getCurrentCustomerId(): ?int
    {
        if (!$this->customerSession->isLoggedIn()) {
            return null;
        }
        $customerId = (int) $this->customerSession->getCustomerId();

        return $customerId > 0 ? $customerId : null;
    }

    public function isOwnedByVisitor(OrderAttachment $attachment): bool
    {
        $attachmentId = (int) $attachment->getId();
        if ($attachmentId <= 0) {
            return false;
        }

        $attachmentCustomerId = (int) $attachment->getData('customer_id');
        if ($attachmentCustomerId > 0) {
            return $this->getCurrentCustomerId() === $attachmentCustomerId;
        }

        if (in_array($attachmentId, $this->getSessionUploadIds(), true)) {
            return true;
        }

        $quoteItemId = (int) $attachment->getData('quote_item_id');

        return $quoteItemId > 0 && $this->isCurrentQuoteItem($quoteItemId);
    }

    public function canManage(OrderAttachment $attachment): bool
    {
        if ((int) $attachment->getData('order_id') > 0) {
            return false;
        }

        return $this->isOwnedByVisitor($attachment);
    }

    public function canView(OrderAttachment $attachment): bool
    {
        if ((int) $attachment->getData('order_id') > 0) {
            return $this->isOrderOwner($attachment);
        }

        return $this->isOwnedByVisitor($attachment);
    }

    public function isOrderOwner(OrderAttachment $attachment): bool
    {
        $customerId = $this->getCurrentCustomerId();
        if ($customerId === null) {
            return false;
        }

        if ((int) $attachment->getData('customer_id') === $customerId) {
            return true;
        }

        $orderId = (int) $attachment->getData('order_id');
        if ($orderId <= 0) {
            return false;
        }

        try {
            $order = $this->orderRepository->get($orderId);
        } catch (\Exception $e) {
            return false;
        }

        return (int) $order->getCustomerId() === $customerId;
    }

    public function isCurrentQuoteItem(int $quoteItemId): bool
    {
        if ($quoteItemId <= 0 || !$this->checkoutSession->getQuoteId()) {
            return false;
        }

        try {
            $quote = $this->checkoutSession->getQuote();
        } catch (\Exception $e) {
            return false;
        }

        foreach ($quote->getAllItems() as $item) {
            if ((int) $item->getId() === $quoteItemId) {
                return true;
            }
        }

        return false;
    }
}
