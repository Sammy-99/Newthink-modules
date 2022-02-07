<?php

namespace Newthink\CustomProductTab\Model\ResourceModel\Contact;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Contact Resource Model Collection
 *
 * @author      Pierre FAY
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Newthink\CustomProductTab\Model\Contact', 'Newthink\CustomProductTab\Model\ResourceModel\Contact');
    }
}