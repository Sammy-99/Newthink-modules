<?php
namespace Bluethink\CustomSection\Controller\Index;

class Customer extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_customer;
    protected $_customerFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\Customer $customers,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_customerFactory = $customerFactory;
        $this->_customer = $customers;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $customerAttr = $this->getCustomerCollection()->getData();
        $filtercustomerAttr = $this->getFilteredCustomerCollection()->getData();

        // echo '<br>'.$this->printCustomer($filtercustomerAttr);

        echo '<pre>';
        print_r($filtercustomerAttr);

        // $customerName = $this->_customer->getCollection()
        //                 ->addNameToSelect()
        //                 ->setPageSize(20)
        //                 ->load(1);
        // print_r($customerName->getData());

        return $this->_pageFactory->create();
    }

    public function printCustomer(array $filtercustomerAttr)
    {
        foreach($filtercustomerAttr as $key){
            echo "useremail: ".$key['email'];
        }
    }

    public function getCustomerAddress(){
        
    }

    public function getCustomerCollection() {
        $id = 1;
        return $this->_customer->getCollection()
                ->addAttributeToSelect("*")
                ->load($id);
    }

    public function getFilteredCustomerCollection() {
        $id = 1;
        return $this->_customerFactory->create()->getCollection()
                ->addAttributeToSelect("*")
                ->addAttributeToFilter("firstname", array("eq" => "John"))
                ->load($id);
    }
}