<?php

namespace Bluethink\CustomSection\Block;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class ModalOverlay extends Template
{

    private $blockRepository;   
   


    public function __construct(
        BlockRepositoryInterface $blockRepository,
        Context $context,
        
        \Magento\Framework\App\Http\Context $httpContext,
        array $data = []
    ) {
        $this->blockRepository = $blockRepository;
        $this->httpContext = $httpContext;
       
        parent::__construct($context, $data);
    }

    public function getContent($identifier)
    {
        try {
            /** @var BlockInterface $block */
            $block = $this->blockRepository->getById($identifier);
            $content = $block->getContent();
        } catch (LocalizedException $e) {
            $content = false;
        }

        return $content;
    }

    /**
     * @return boolean
     */
    public function isCustomerLogIn() {
        return $this->httpContext->isLoggedIn();
    }

    public function checkSubscriber(){
        $customerId = $this->checkLoggin();

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $subscriberFactory = $objectManager->get('\Magento\Newsletter\Model\SubscriberFactory');
        $userIsSubscriber = $subscriberFactory->create()->loadByCustomerId($customerId);
        // return $userIsSubscriber;
        // $email = $userIsSubscriber->getSubscriberEmail();
        if ($userIsSubscriber->isSubscribed()) {
            return true;
        } else {
            return false;
        }

    }


	public function checkLoggin(){
        $object = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $object->get('Magento\Customer\Model\Session');
        if($customerSession->isLoggedIn()) {

            $customerId = $customerSession->getID();

            return $customerId;            
            
        }else{
            return false;
        }
        
    }
    public function checkEmail($email){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $subscriberFactory = $objectManager->get('\Magento\Newsletter\Model\SubscriberFactory');
        $checkSubscriber = $this->subscriberFactory->create()->loadByEmail($customerEmail);

        if ($checkSubscriber->isSubscribed()) {
            return true;
        } else {
            return false;
        }
    }
    // public function isSubscriber(){
    //     $userIsSubscriber = $this->checkSubscriber();
    //     if ($userIsSubscriber->isSubscribed()) {
    //         return true;
    //    } else {
    //        return false;
    //    }
    // }

    // public function getuserEmail(){
    //    $userIsSubscriber = $this->checkSubscriber();
    //    $email = $userIsSubscriber->getSubscriberEmail();
    //     return $email;
    // }

}