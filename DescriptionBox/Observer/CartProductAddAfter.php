<?php

namespace Newthink\DescriptionBox\Observer;

use Magento\Checkout\Model\Session; 
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Model\QuoteRepository;

class CartProductAddAfter implements \Magento\Framework\Event\ObserverInterface
{
    protected $quoteFactory;

    public function __construct(
        Session $session,
        QuoteRepository $quoteRepository,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->session = $session;
        $this->quoteRepository = $quoteRepository;
        $this->_request = $request;
    }
    
    public function execute(Observer $observer) 
    {           
        
        $quoteId = $this->session->getQuote()->getId();
        

        if($quoteId){

            $quote = $this->quoteRepository->get($quoteId);
            if(!$quote->getIsActive()){
                return;
            }
 
            $postData = $this->_request->getParams();
            $description = $postData['description_box'];
            $product = $observer->getEvent()->getDataByKey('product');
            $item = $this->session->getQuote()->getItemByProduct($product);
            $itemId = $item->getId();            
            $quoteItem = $quote->getItemById($itemId);
            $quoteItem->setDescriptionBox($description); // Set custom field value
            $quoteItem->save();
            
        }
              
        return $this;
        
    }
}

?>