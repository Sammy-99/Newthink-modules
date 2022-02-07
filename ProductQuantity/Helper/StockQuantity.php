<?php
namespace Newthink\ProductQuantity\Helper;

class StockQuantity extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var Magento\CatalogInventory\Api\StockStateInterface
     */
    protected $stockState;
    protected $registry;

    /**
     * Output constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\CatalogInventory\Api\StockStateInterface $stockState
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\CatalogInventory\Api\StockStateInterface $stockState
    ) {
        $this->stockState = $stockState;
        parent::__construct($context);
        $this->registry = $registry;
    }

        public function getStockProductQuantity()
        {
            $qty_status = $this->registry->registry('current_product')->getQuantityAndStockStatus();

            //$productQuantity = $qty_status['qty'];
            return $qty_status;
            
        }


}