<?php
 
namespace Bluethink\CustomSection\Model\Adminhtml\Helper;


use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Payment\Model\Config;

class Data extends \Magento\Framework\DataObject 
    implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $_appConfigScopeConfigInterface;
    /**
     * @var Config
     */
    protected $_paymentModelConfig;
    
    /**
     * @param ScopeConfigInterface $appConfigScopeConfigInterface
     * @param Config               $paymentModelConfig
     */
    public function __construct(
        ScopeConfigInterface $appConfigScopeConfigInterface,
        Config $paymentModelConfig
    ) {

        $this->_appConfigScopeConfigInterface = $appConfigScopeConfigInterface;
        $this->_paymentModelConfig = $paymentModelConfig;
    }
 
    public function toOptionArray()
    {
        $payments = $this->_paymentModelConfig->getActiveMethods();
        $methods = array();
        foreach ($payments as $paymentCode => $paymentModel) {
            $paymentTitle = $this->_appConfigScopeConfigInterface
                ->getValue('payment/'.$paymentCode.'/title');
            $methods[$paymentCode] = array(
                'label' => $paymentTitle,
                'value' => $paymentCode
            );
        }
        return $methods;
    }
}
 
// use \Magento\Sales\Model\ResourceModel\Order\Payment\Collection
 
// class Data extends \Magento\Framework\Option\ArrayInterface
// {
//     public function __construct(
//         \Magento\Framework\View\Element\Template\Context $context,
//         \Magento\Payment\Model\Config\Source\Allmethods $allPaymentMethod,
//         array $data = []
//     ) {
//         $this->allPaymentMethod = $allPaymentMethod;
//         parent::__construct($context, $data);
//     }
 
//     /**
//  * All Payment Method in Magento 2 backend
//  *
//  * @return Array
//      */
//     public function toOptionArray()
//     {
//         // return $this->allPaymentMethod->getPaymentMethods();
//         return $this->allPaymentMethod->getPaymentMethodList();
//     }

// }