<?php

    namespace Newthink\Username\Plugin\Customer;

    use Magento\Framework\Controller\ResultFactory;
    use Magento\Framework\UrlInterface;

    class LoginPost
    {
        protected $resultFactory;
        protected $url;
        protected $_request;
        protected $_response;

        public function __construct(
            \Magento\Framework\App\Action\Context $context
            

        )
        {
            $this->_request = $context->getRequest();
            $this->_response = $context->getResponse();
            
        }

        public function aroundExecute(\Magento\Customer\Controller\Account\LoginPost $subject, \Closure $proceed)
        {
            // echo "<pre>";
            
            // $login =  $this->_request->getPost("login");
            // //$login = $this->getRequest()->getPost();
            // print_r($login);die(" new loginpost");
           
        }
    }
?>