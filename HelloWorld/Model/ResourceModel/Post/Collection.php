<?php
<<<<<<< HEAD
namespace Bluethink\HelloWorld\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'customer_info_collection';
=======
namespace Newthink\HelloWorld\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'newthink_helloworld_post_collection';
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
<<<<<<< HEAD
		$this->_init('Bluethink\HelloWorld\Model\Post', 'Bluethink\HelloWorld\Model\ResourceModel\Post');
=======
		$this->_init('Newthink\HelloWorld\Model\Post', 'Newthink\HelloWorld\Model\ResourceModel\Post');
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31
	}

}