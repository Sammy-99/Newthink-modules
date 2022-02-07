<?php
 
namespace Newthink\CustomProductTab\Setup;
 
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
 
    public function __construct(
        EavSetupFactory $eavSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
 
        /* Product Custom Title */
        //$eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'fixed_price');
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'fixed_price',
            [
                'type' => 'varchar',
                'label' => 'Fixed Price',
                'input' => 'text',
                'required' => false,
                'sort_order' => 10,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Daily Deals',
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
            ]
        );
        /* Product Custom Select Options */
        //$eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'from_date');
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'from_date',
            [
                'type' => 'varchar',
                'label' => 'From',
                'input' => 'date',
                'required' => false,
                'sort_order' => 20,
                // 'source' => \Newthink\CustomProductTab\Model\Config\Source\CustomModeList::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'Daily Deals',
            ]
        );
        /* Product Custom Multi Select Option */
        //$eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'to_date');
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'to_date',
            [
                'type' => 'varchar',
                'label' => 'To',
                'input' => 'date',
                'required' => false,
                'sort_order' => 30,
                // 'source' => \Newthink\CustomProductTab\Model\Config\Source\CMSPageList::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'group' => 'Daily Deals',
            ]
        );
    }
}