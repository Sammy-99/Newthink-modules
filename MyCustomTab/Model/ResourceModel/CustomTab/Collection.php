<?php 

namespace Newthink\MyCustomTab\Model\ResourceModel\CustomTab;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{ 
/** * Define resource model 
* * @return void 
*/
protected function _construct() 
{ 
       $this->_init('Newthink\MyCustomTab\Model\CustomTab', 'Newthink\MyCustomTab\Model\ResourceModel\CustomTab');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }
 
}