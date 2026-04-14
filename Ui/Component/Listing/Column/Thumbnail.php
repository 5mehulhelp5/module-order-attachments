<?php
declare(strict_types=1);

namespace Panth\OrderAttachments\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Thumbnail extends Column
{
    private const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

    private StoreManagerInterface $storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
            $fieldName = $this->getData('name');

            foreach ($dataSource['data']['items'] as &$item) {
                $ext = strtolower($item['file_extension'] ?? '');
                $filePath = $item['file_path'] ?? '';

                if (in_array($ext, self::IMAGE_EXTENSIONS, true) && $filePath) {
                    $imageUrl = $mediaUrl . $filePath;
                    $item[$fieldName . '_src'] = $imageUrl;
                    $item[$fieldName . '_alt'] = htmlspecialchars($item['original_filename'] ?? '');
                    $item[$fieldName . '_orig_src'] = $imageUrl;
                    $item[$fieldName . '_link'] = $imageUrl;
                } else {
                    // Non-image: show styled file type badge
                    $extUpper = strtoupper(htmlspecialchars($ext));
                    $item[$fieldName . '_src'] = '';
                    $item[$fieldName . '_alt'] = htmlspecialchars($item['original_filename'] ?? '');
                    $item[$fieldName . '_orig_src'] = '';
                    $item[$fieldName . '_link'] = '';
                }
            }
        }
        return $dataSource;
    }
}
