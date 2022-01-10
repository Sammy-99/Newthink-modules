<?php

namespace Newthink\FAQ\Block;

class FaqContent extends \Magento\Framework\View\Element\Template
{
    protected $collectionFactory;
    protected $manageFaqFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Newthink\FAQ\Model\ResourceModel\Groupfaq\Grid\CollectionFactory $collectionFactory,
        \Newthink\FAQ\Model\ResourceModel\ManageFaq\Grid\CollectionFactory $manageFaqFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_request = $request;
        $this->_storeManager = $storeManager;
        $this->collectionFactory = $collectionFactory;
        $this->manageFaqFactory = $manageFaqFactory;
    }

    public function getGroupName(){
        $collections = $this->collectionFactory->create();
        return $collections;
    }

    public function getFaqContent(){
        $collections = $this->manageFaqFactory->create();
        return $collections;
    }
}