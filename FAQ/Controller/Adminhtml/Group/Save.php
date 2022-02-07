<?php

namespace Newthink\FAQ\Controller\Adminhtml\Group;

class Save extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
    protected $groupfaqFactory;
    protected $resultFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Newthink\FAQ\Model\GroupfaqFactory $groupfaqFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
        $this->groupfaqFactory = $groupfaqFactory;
        $this->resultFactory = $resultFactory;
	}

	public function execute()
	{
        try {
           
            $values = $this->getRequest()->getPostValue();

            if (!empty($values)) {

                $model = $this->groupfaqFactory->create();
                $model->setData($values)->save();
                // echo "<pre>";
                // print_r($this->getRequest()->getParam('back'));
                // die("save controller");

                if ($this->getRequest()->getParam('back')) {
                    print_r(($model->getId()));die("sdhsgd");
                    return $resultRedirect->setPath('*/*/form', ['id' => $model->getId(), '_current' => true]);
                }
      
                $this->messageManager->addSuccessMessage(__('New Group Added!'));
     
            }

        } catch(\Exception $e){
            $this->messageManager->addErrorMessage($e, __("please try again!"));
        }

        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('newthink/group/index');

		return $resultRedirect;
	}


}