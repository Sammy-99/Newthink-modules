<?php
 
namespace Bluethink\Development\Controller\Index;
 
class Subscribe extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory
        
     ){
          $this->_pageFactory = $pageFactory;
          return parent::__construct($context);
     }
 
     public function execute()
     {
         $value=$this->getRequest()->getParams();

         // echo "------------";
         // echo "<pre>";
         // print_r($value);

     }
}

