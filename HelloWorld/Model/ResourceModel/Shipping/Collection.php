<?php
namespace Newthink\HelloWorld\Model\ResourceModel\Shipping;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'shipping_id';
	protected $_eventPrefix = 'newthink_helloworld_shipping_collection';
	protected $_eventObject = 'shipping_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Newthink\HelloWorld\Model\Shipping', 'Newthink\HelloWorld\Model\ResourceModel\Shipping');
	}

}