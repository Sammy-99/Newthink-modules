<?php
namespace Bluethink\HelloWorld\Controller\Adminhtml\Customer;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
 
class Save extends \Magento\Backend\App\Action 
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected $_pageFactory;

	protected $_postFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		// \Magento\Backend\Model\View\Result\PageFactory $pageFactory,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Bluethink\HelloWorld\Model\PostFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$data = (array)$this->getRequest()->getPostValue();

		echo"<pre>";print_r($data);die;
        $data = $this->request->getParams();
		
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
	}
}