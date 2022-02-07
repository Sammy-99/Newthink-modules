<?php
<<<<<<< HEAD
namespace Bluethink\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'customer_info';

	protected $_cacheTag = 'customer_info';

	protected $_eventPrefix = 'customer_info';

	protected function _construct()
	{
		$this->_init('Bluethink\HelloWorld\Model\ResourceModel\Post');
=======

namespace Newthink\HelloWorld\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'newthink_helloworld_user';

	protected $_cacheTag = 'newthink_helloworld_user';

	protected $_eventPrefix = 'newthink_helloworld_user';

	protected function _construct()
	{
		$this->_init('Newthink\HelloWorld\Model\ResourceModel\Post');
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31
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