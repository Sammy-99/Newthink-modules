<?php

namespace Newthink\FAQ\Controller\Adminhtml\Manage;

class Save extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $manageFactory;
	protected $groupfaqFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Framework\Controller\ResultFactory $resultFactory,
		\Newthink\FAQ\Model\ManageFaqFactory $manageFactory,
		\Newthink\FAQ\Model\GroupfaqFactory $groupfaqFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		$this->manageFactory = $manageFactory;
		$this->resultFactory = $resultFactory;
		$this->groupfaqFactory = $groupfaqFactory;
	}

	public function execute()
	{
		$values = $this->getRequest()->getPostValue();
		$groupName = $this->getGroupName($values);
		$resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);

		try {
            if (!empty($values)) {
				$model = $this->manageFactory->create();
				$model->setTitle($values['title'])->save();
				$model->setGroupName($groupName)->save();
				$model->setSortOrder($values['sort_order'])->save();
				$model->setStatus($values['status'])->save();
				$model->setContent($values['content'])->save();

				if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/form', ['id' => $model->getId(), '_current' => true]);
                }
                
                $this->messageManager->addSuccessMessage(__('New Group Added!'));
            }

        } catch(\Exception $e){
            $this->messageManager->addErrorMessage($e, __("please try again!"));
        }

        $resultRedirect->setPath('newthink/manage/index');

		return $resultRedirect;
	}

	public function getGroupName($values){

		$groupId = $values['group_name'][0];
		$getGroupName = $this->groupfaqFactory->create()->load($groupId)->getGroupName();

		return $getGroupName;
	}


}