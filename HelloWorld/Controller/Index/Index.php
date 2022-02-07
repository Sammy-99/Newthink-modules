<?php
<<<<<<< HEAD
namespace Bluethnk\HelloWorld\Controller\Index;
=======
namespace Newthink\HelloWorld\Controller\Index;
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

<<<<<<< HEAD
	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Bluethink\HelloWorld\Model\PostFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
=======
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory; 
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31
		return parent::__construct($context);
	}

	public function execute()
	{
<<<<<<< HEAD
        echo "I am from frontend controller";
        $data = $this->getRequest()->getParams();
        if(is_array($data)){
            print_r($data);
        }
		// $post = $this->_postFactory->create();
		// $collection = $post->getCollection();
		// foreach($collection as $item){
		// 	echo "<pre>";
		// 	print_r($item->getData());
		// 	echo "</pre>";
		// }
		// exit();
		// return $this->_pageFactory->create();
=======
		return $this->_pageFactory->create();
>>>>>>> 88b16565aa1e403ac404772eefd28b1bf3987a31
	}
}