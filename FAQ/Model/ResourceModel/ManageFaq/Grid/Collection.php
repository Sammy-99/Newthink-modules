<?php

namespace Newthink\FAQ\Model\ResourceModel\ManageFaq\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Contact Resource Model Collection
 *
 * @author      Pierre FAY
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected $_idFieldName = 'id';

    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Newthink\FAQ\Model\ManageFaq', 'Newthink\FAQ\Model\ResourceModel\ManageFaq');
    }

}
