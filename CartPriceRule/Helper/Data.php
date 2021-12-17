<?php

namespace Newthink\CartPriceRule\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\ScopeInterface;
use Magento\Backend\Model\Auth\Session;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    
    protected $registry;
    protected $authSession;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Registry $registry,
        Session $authSession
    ) 
    {
        parent::__construct($context);
        $this->authSession = $authSession;
        $this->registry = $registry;

    }

    public function getCurrentUser()
    {
        return $this->authSession->getUser();
    
    }

    public function getName(){
        return $this->getCurrentUser()->grtUsername();
    }

    

    

}