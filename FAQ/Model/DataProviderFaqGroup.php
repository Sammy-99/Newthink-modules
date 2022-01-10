<?php
namespace Newthink\FAQ\Model;

use Newthink\FAQ\Model\ResourceModel\Groupfaq\Grid\CollectionFactory;

class DataProviderFaqGroup extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $groupfaqCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $groupfaqCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->_loadedData[$item->getId()] = $item->getData();
        }

        return $this->_loadedData;        
    }
}