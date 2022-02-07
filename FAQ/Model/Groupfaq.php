<?php

namespace Newthink\FAQ\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;

/**
 * Groupfaq Model
 *
 * @author      Pierre FAY
 */
class Groupfaq extends AbstractModel
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $_dateTime;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Newthink\FAQ\Model\ResourceModel\Groupfaq::class);
    }
    
}
