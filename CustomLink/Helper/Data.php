<?php

namespace Newthink\CustomLink\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    
    protected $registry;


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Registry $registry
    ) 
    {
        parent::__construct($context);
        $this->registry = $registry;

    }

    public function getCustomHelper()
    {
        return 'Custom helper';
    
    }


    

    

}