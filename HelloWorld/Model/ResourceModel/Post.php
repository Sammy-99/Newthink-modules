<?php
<<<<<<< HEAD
namespace Bluethink\HelloWorld\Model\ResourceModel;
=======
namespace Newthink\HelloWorld\Model\ResourceModel;
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31


class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
<<<<<<< HEAD
		$this->_init('customer_info', 'id');
=======
		$this->_init('newthink_helloworld_user', 'post_id');
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31
	}
	
}