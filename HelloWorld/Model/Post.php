<?php

namespace Newthink\HelloWorld\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'newthink_helloworld_user';

	protected $_cacheTag = 'newthink_helloworld_user';

	protected $_eventPrefix = 'newthink_helloworld_user';

	protected function _construct()
	{
		$this->_init('Newthink\HelloWorld\Model\ResourceModel\Post');
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