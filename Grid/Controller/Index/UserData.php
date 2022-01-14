<?php

namespace Bluethink\Grid\Controller\Index;

class UserData extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_orderCollectionFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory 
        )
    {
        $this->_pageFactory = $pageFactory;
        $this->scopeConfig = $scopeConfig;
        $this->_orderCollectionFactory = $orderCollectionFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        try {
            $startDate = $this->scopeConfig->getValue('csv/dataConfig/startdate', $storeScope);
            $endDate = $this->scopeConfig->getValue('csv/dataConfig/enddate', $storeScope);

            echo "Information of Order From ".$startDate;
            echo "<br> To <br>";
            echo $endDate."<br>";

            // $collection = $this->_orderCollectionFactory->create()->addAttributeToSelect('*');
            $collection = $this->_orderCollectionFactory->create()
                            ->addAttributeToFilter('created_at', [
                                'from' => [$startDate],
                                'to' => [$endDate],
                            ]);

            // echo '<pre>';
            // print_r($collection->getData());
            // echo "another way";

        
            $data = $this->_orderCollectionFactory->create()
                    ->addFieldToFilter('created_at', array('gteq' => $startDate)) //gteq = greater than or equal to
                    ->addFieldToFilter('created_at', array('lteq' => $endDate))->getData(); // lteq = less than or equal to
            // foreach($collection as $key){
            //     echo "Customer ID: ".$key['customer_id']."<br> Increment ID: ".$key['increment_id']."<br>";
            // }

            // echo '<pre>';
            // print_r($data);

            return $this->_pageFactory->create();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}