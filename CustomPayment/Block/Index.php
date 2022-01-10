<?php

namespace Newthink\CustomPayment\Block;

use Magento\Quote\Model\QuoteRepository;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $quoteFactory;
    protected $sessionFactory;

    public function __construct(
        \Magento\Checkout\Model\SessionFactory $sessionFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        QuoteRepository $quoteRepository,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->sessionFactory = $sessionFactory;
        $this->quoteRepository = $quoteRepository;
        $this->_request = $request;
        $this->_storeManager = $storeManager;
    }

    public function getOrderId(){
        
        return $this->sessionFactory->create();     
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
        
    }
    
}