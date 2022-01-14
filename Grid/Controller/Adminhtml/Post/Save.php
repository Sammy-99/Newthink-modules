<?php

namespace Bluethink\Grid\Controller\Adminhtml\Post;

use Bluethink\Grid\Model\PostFactory;

class Save extends \Magento\Backend\App\Action
{
  /**
  * Index Action*
  * @return void
  */

	protected $postFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context, 
		\Bluethink\Grid\Model\PostFactory $postFactory
		) 
	{
		$this->postFactory = $postFactory;
		parent::__construct($context);
	}
	public function execute()
	{
		try {
			$data = $this->getRequest()->getParams();
			if($data){
				$updatePost = $this->postFactory->create();
				$updatePost->setData($data)->save($data);
				$this->messageManager->addSuccessMessage(__('Data Updated Successfully'));
			}
		} catch (\Exception $e) {
			$this->messageManager->addSuccessManager(__($e, "Something went Wrong"));

		}
		$resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('bluethink_grid/post/index');
        return $resultRedirect;

	}


	
}
