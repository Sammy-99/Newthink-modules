<?php
namespace Newthink\HelloWorld\Model\ResourceModel;


class Shipping extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('newthink_sale_shipmentTrack', 'shipping_id');
	}
	
}