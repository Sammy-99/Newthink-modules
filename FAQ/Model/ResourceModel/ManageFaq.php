<?php

namespace Newthink\FAQ\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Groupfaq Resource Model
 *
 * @author      Pierre FAY
 */
class ManageFaq extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('newthink_manage_faq_questions', 'id');
    }
}