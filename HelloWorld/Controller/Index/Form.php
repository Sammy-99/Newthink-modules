<?php

namespace Newthink\HelloWorld\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Form extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Newthink\HelloWorld\Model\PostFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}
    /**
     * Booking action
     *
     * @return void
     */
    public function execute()
    {
        try {
            // 1. POST request : Get booking data
            $post = (array) $this->getRequest()->getPost();

            if (!empty($post)) {
            
                // Retrieve your form data 
                $name   = $post['name'];
                $email    = $post['email'];
                $Password       = $post['password'];
    
                $model = $this->_postFactory->create();
                $model->setData($post)->save();
                
    
                // Doing-something with...
    
                // Display the succes form validation message
                $this->messageManager->addSuccessMessage(__('Submitted!'));
     
            }

        } catch(\Exception $e){
            $this->messageManager->addErrorMessage($e, __("please try again!"));
        }

        // Redirect to your form page (or anywhere you want...)
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('newthink/index/index');

        return $resultRedirect;      

        
        
       
    }
}