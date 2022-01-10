<?php

namespace Newthink\FAQ\Model\ResourceModel\Groupfaq\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Groupfaq Resource Model Collection
 *
 * @author      Pierre FAY
 */
class Collection extends AbstractCollection
{
    public $_idFieldName = 'id';
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Newthink\FAQ\Model\Groupfaq::class, \Newthink\FAQ\Model\ResourceModel\Groupfaq::class);
    }


     /**
     * Retrieve option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return parent::_toOptionArray('id', 'group_name');
    }
}
