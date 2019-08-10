<?php
/**
 * Grid Schema Setup.
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */

namespace CustomCatalog\Grid\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();

        /*
         * Create table 'qentelli_custom_catalog'
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('qentelli_custom_catalog')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Entity Id'
        )->addColumn(
            'product_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Product Id'
        )->addColumn(
            'copywrite_info',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'CopyWriteInfo'
        )->addColumn(
            'vpn',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'VPN'
        )->addColumn(
            'sku',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'SKU'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [],
            'Status'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,
            ],
            'Created At'
        )->addIndex(
               $installer->getIdxName('qentelli_custom_catalog',
                   ['product_id', 'vpn'],
                   \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
               ),
               ['product_id', 'vpn'],
               ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
        )->addIndex(
               $installer->getIdxName('qentelli_custom_catalog',
                   ['copywrite_info', 'sku'],
                   \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
               ),
               ['copywrite_info', 'sku'],
               ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT]
        )->setComment(
            'Custom Catalog Data Table'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
