<?php

namespace Bluethink\HelloWorld\Block\Adminhtml\Testing\Button;

class CustomButton extends \Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic
{

    // public function __construct(
    //     \Magento\Framework\App\RequestInterface $request
    //  ) {
    //     $this->request = $request;
    //  }

    public function getButtonData()
    {
        // echo "<pre>";print_r($this->request->getParams());die;
        return [
                'id' => 'CustomButton',
                'label' => __('Save'),
                'on_click' => sprintf("location.href= '%s';", $this->getBackUrl()),
                // 'on_click' => "alert('ok')",
                'class' => 'save',
                'sort_order' => 10
        ];

    }
    public function getBackUrl()
    {
         return $this->getUrl('uiform/customer/save');
        // return "localhost/mage2.3/helloworld/index/index";
         
    }
}