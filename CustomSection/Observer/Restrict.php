<?php
namespace Bluethink\CustomSection\Observer;
 
use Magento\Framework\Event\ObserverInterface;
 
class Restrict implements ObserverInterface
{
    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $_messageManager;
 
    /**
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Message\ManagerInterface $messageManager
    )
    {
        $this->_scopeConfig = $scopeConfig;
        $this->_messageManager = $messageManager;
    }
 
    /**
     * add to cart event handler.
     *
     * @param \Magento\Framework\Event\Observer $observer
     *
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $myconfig = $this->getConfigValue();
        try {
            if (!$myconfig) {
                $this->_messageManager->addError(__('You can not add to cart.'));
                //set false if you not want to add product to cart
                $observer->getRequest()->setParam('product', false);
                return $this;
         }
 
        return $this;
        } catch (\Exception $e) {
            //throw $e;
        }
    }

    public function getConfigValue(){
        $myconfig = $this->_scopeConfig->getValue('mage/customConfig/allow_add_to_cart', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        return $myconfig;
     }
}