<?php
namespace Newthink\MyCustomTab\Model\ResourceModel;
 
class CustomTab extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('newthink_custom_tab', 'id');
    }
}