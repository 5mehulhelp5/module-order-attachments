<?php
declare(strict_types=1);

namespace Panth\OrderAttachments\Controller\Upload;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Panth\OrderAttachments\Model\ResourceModel\OrderAttachment\CollectionFactory;

class Listing implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $jsonFactory,
        private readonly CollectionFactory $collectionFactory
    ) {}

    public function execute()
    {
        $productId = (int) $this->request->getParam('product_id');
        $result = $this->jsonFactory->create();

        if (!$productId) {
            return $result->setData(['files' => []]);
        }

        // Return empty for now — files are loaded after add-to-cart via quote_item_id
        return $result->setData(['files' => []]);
    }
}
