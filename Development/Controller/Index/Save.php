<?php
namespace Bluethink\Development\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $customerModel;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Bluethink\Development\Model\Save $customerModel
    ) {
        $this->customerModel = $customerModel;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->customerModel->demo();
    }
}