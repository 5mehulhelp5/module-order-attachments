<?php

declare(strict_types=1);

namespace Panth\OrderAttachments\Model\ResourceModel\OrderAttachment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Panth\OrderAttachments\Model\OrderAttachment;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment as OrderAttachmentResource;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'attachment_id';

    /**
     * @var string
     */
    protected $_eventPrefix = 'panth_order_attachment_collection';

    /**
     * @var string
     */
    protected $_eventObject = 'order_attachment_collection';

    /**
     * Define resource model
     */
    protected function _construct(): void
    {
        $this->_init(OrderAttachment::class, OrderAttachmentResource::class);
    }
}
