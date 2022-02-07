<?php
namespace Newthink\CustomLink\Controller\Customlink;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $customHelper;
	protected $text;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Newthink\CustomLink\Helper\Data $customHelper,
		\Newthink\CustomLink\Model\Text $text,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		$this->customHelper = $customHelper;
		$this->text = $text; 
		return parent::__construct($context);
	}

	public function execute()
	{
		return $this->_pageFactory->create();
	}

	public function getText()
	{
		return $this->text->getName();
	}
}