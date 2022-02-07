<?php
<<<<<<< HEAD
namespace Bluethink\HelloWorld\Controller\Index;
=======

namespace Newthink\HelloWorld\Controller\Index;

>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31

class Test extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		echo "Hello World";
		exit;
	}
<<<<<<< HEAD
}
=======
}
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31
