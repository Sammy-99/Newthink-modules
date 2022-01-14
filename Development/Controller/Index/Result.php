<?php
namespace Bluethink\Development\Controller\Index;

class Result extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;
    
    protected $_context;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request)
    {
        $this->_pageFactory = $pageFactory;
       
        $this->request = $request;

        return parent::__construct($context);
    }

    public function execute()
    {
        $email = $this->request->getPost('email');

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
        $subscriber= $objectManager->create('Magento\Newsletter\Model\SubscriberFactory'); 
        $subscribe=$subscriber->create()->subscribe($email);
        $subscribe->save();


        $this->_pageFactory->create();

    }

}







