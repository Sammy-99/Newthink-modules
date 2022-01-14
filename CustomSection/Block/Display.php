<?php
namespace Bluethink\CustomSection\Block;

class Display extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function subscriptionForm()
	{
		return __('Fill the below form: ');
	}

	public function sayHello()
	{
		return __('My Product Payment Method will be: ');
	}
}