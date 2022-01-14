<?php

namespace Bluethink\CustomBillingField\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $quoteAddressTable = 'quote_address';
        $orderTable = 'sales_order_address';

        //Quote address table
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quoteAddressTable),
                'deliverydate',
                [
                    'type' => 'datetime',
                    'nullable' => false,
                    'comment' =>'Delivery Date'
                ]
            );
        //Order address table
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($orderTable),
                'deliverydate',
                [
                    'type' => 'datetime',
                    'nullable' => false,
                    'comment' =>'Delivery Date'

                ]
            );

        $setup->endSetup();
    }
}