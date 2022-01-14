<?php
namespace Bluethink\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'customer_info';

	protected $_cacheTag = 'customer_info';

	protected $_eventPrefix = 'customer_info';

	protected function _construct()
	{
		$this->_init('Bluethink\HelloWorld\Model\ResourceModel\Post');
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