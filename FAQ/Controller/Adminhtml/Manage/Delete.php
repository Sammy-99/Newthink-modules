<?php

namespace Newthink\FAQ\Controller\Adminhtml\Manage;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Newthink\FAQ\Model\ResourceModel\ManageFaq\Grid\CollectionFactory;

class Delete extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $_collectionFactory;
    protected $_objectManager;

    /**
     * @param Context           $context
     * @param Filter            $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        \Magento\Framework\ObjectManagerInterface $objectmanager,
        CollectionFactory $collectionFactory
    ) {

        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        $this->_objectManager = $objectmanager;
        parent::__construct($context);
    }

    public function execute()
    {
        $deleteIds = $this->getRequest()->getParam('selected');
        if (!is_array($deleteIds) || empty($deleteIds)) {
            $this->messageManager->addError(__('Please select item(s).'));
        } else {
            try {
                $recordDeleted = 0;
                foreach ($deleteIds as $itemId) {
                    $row = $this->_objectManager->get('Newthink\FAQ\Model\ManageFaq')->load($itemId);
                    $row->delete();
                    $recordDeleted++;
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been deleted.', $recordDeleted)
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');       
    }

}