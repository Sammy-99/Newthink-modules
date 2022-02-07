<?php
 
namespace Newthink\CartPriceRule\Setup;
 
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
 
class UpgradeSchema implements UpgradeSchemaInterface
{
    protected $resourceConfig;
 
    public function __construct(
        ConfigInterface $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }
 
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
 
        $installer->getConnection()->addColumn(
            $installer->getTable('salesrule'),
            'made_by',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'unsigned' => true,
                'nullable' => true,
                'default' => '',
                'required' => true,
                'comment' => 'made_by'
            ]
        );
 
        $installer->endSetup();
    }
}