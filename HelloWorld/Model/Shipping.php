<?php

namespace Newthink\HelloWorld\Model;

class Shipping extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'newthink_sale_shipmentTrack';

	protected $_cacheTag = 'newthink_sale_shipmentTrack';

	protected $_eventPrefix = 'newthink_sale_shipmentTrack';

	protected function _construct()
	{
		$this->_init('Newthink\HelloWorld\Model\ResourceModel\Shipping');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}