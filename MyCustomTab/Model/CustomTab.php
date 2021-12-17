<?php 
namespace Newthink\MyCustomTab\Model;
 
class CustomTab extends \Magento\Framework\Model\AbstractModel
{ 
/** * Initialize resource model
 * * @return void
 */
protected function _construct()
 { 
   $this->_init('Codextblog\Customtab\Model\ResourceModel\Customtab');
 }
}