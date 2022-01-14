<?php

namespace Bluethink\HelloWorld\Block\Adminhtml\Testing;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Category\AbstractCategory;

/**
 * Class SaveButton
 */
class Save extends AbstractCategory implements ButtonProviderInterface
{
    /**
     * Customer data save button
     *
     * @return array
     */
    public function getButtonData()
    {
        $category = $this->getCategory();
        $categoryId = (int)$category->getId();

        if ($categoryId) {
            return [
                'id' => 'save',
                'label' => __('Save'),
                'on_click' => "alert('ok')",
                'class' => 'Submit',
                'sort_order' => 10
            ];
        }

        return [];
    }
}