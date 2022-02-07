<?php

namespace Newthink\CustomLink\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $index;
    protected $helper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Newthink\CustomLink\Controller\Customlink\Index $index,
        \Newthink\CustomLink\Helper\Data $customHelper,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->index = $index;
        $this->helper = $customHelper;
    }

    public function getCustom()
    {
        return $this->index->getText();
    }

    public function getHelperData(){
        return $this->helper->getCustomHelper();
    }
}