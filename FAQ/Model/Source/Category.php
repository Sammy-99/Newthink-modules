<?php

namespace Newthink\FAQ\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
 
class Category implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;
    protected $_options;
 
    public function __construct(
        \Newthink\FAQ\Model\ResourceModel\Groupfaq\Grid\CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }
 
    public function toOptionArray() {
        if ($this->_options === null) {
            $collection = $this->collectionFactory->create();

            $this->_options = [['label' => '', 'value' => '']];

            foreach ($collection as $category) {
                $this->_options[] = [
                    'label' => __('%1', $category->getGroupName()),
                    'value' => $category->getId()
                ];
            }
        }

        return $this->_options;
    }
}