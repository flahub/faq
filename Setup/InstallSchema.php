<?php

namespace Orangecat\Faq\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();
        $this->_createCategoryTable($setup);
        $this->_createFaqTable($setup);
        $setup->endSetup();
    }

    /**
     * @param SchemaSetupInterface $setup
     */

    private function _createCategoryTable($setup)
    {
        /** @var \Magento\Framework\DB\Adapter\AdapterInterface $connection */
        $connection = $setup->getConnection();
        $tableName = 'oc_faq_category';
        if (!$setup->tableExists($tableName)) {
            $table = $connection->newTable($setup->getTable($tableName))
                ->addColumn(
                    'category_id', Table::TYPE_INTEGER, null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true
                    ], 'ID'
                )
                ->addColumn(
                    'title', Table::TYPE_TEXT, 255, ['nullable' => false],
                    'Title'
                )
                ->addColumn(
                    'status', Table::TYPE_BOOLEAN, null, ['nullable' => false, 'default' => 0],
                    'Status'
                )
                ->addColumn(
                    'store_ids', Table::TYPE_TEXT, 255,
                    ['nullable' => false, 'default' => '0'], 'Store Ids'
                )
                ->addColumn(
                    'sort_order',
                    Table::TYPE_SMALLINT,
                    null,
                    ['nullable' => false, 'default' => '0', 'unsigned' => true],
                    'Sort Order'
                )
                ->addColumn(
                    'creation_time',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Creation Time'
                )
                ->addColumn(
                    'update_time',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                    'Modification Time'
                )
                ->addIndex(
                    $setup->getIdxName(
                        $tableName,
                        ['sort_order']
                    ),
                    ['sort_order']
                )
                ->addIndex(
                    $setup->getIdxName(
                        $tableName,
                        ['status']
                    ),
                    ['status']
                )
                ->addIndex(
                    $setup->getIdxName(
                        $tableName,
                        ['store_ids']
                    ),
                    ['store_ids']
                )
                ->setComment('FAQ Category');
            $connection->createTable($table);

        }
    }

    /**
     * @param SchemaSetupInterface $setup
     */
    private function _createFaqTable($setup)
    {
        /** @var \Magento\Framework\DB\Adapter\AdapterInterface $connection */
        $connection = $setup->getConnection();
        $tableName = 'oc_faq';
        if (!$setup->tableExists($tableName)) {
            $table = $connection->newTable($setup->getTable($tableName))
                ->addColumn(
                    'faq_id', Table::TYPE_INTEGER, null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true
                    ], 'ID'
                )
                ->addColumn(
                    'category_id', Table::TYPE_INTEGER, null, ['nullable' => false, 'unsigned' => true],
                    'Category Id'
                )
                ->addColumn(
                    'question', Table::TYPE_TEXT, 255, ['nullable' => false],
                    'Faq Question'
                )
                ->addColumn(
                    'status', Table::TYPE_BOOLEAN, null, ['nullable' => false, 'default' => 0],
                    'Status'
                )
                ->addColumn(
                    'store_ids', Table::TYPE_TEXT, 255,
                    ['nullable' => false, 'default' => '0'], 'Store Ids'
                )
                ->addColumn(
                    'sort_order',
                    Table::TYPE_SMALLINT,
                    null,
                    ['nullable' => false, 'default' => '0', 'unsigned' => true],
                    'Sort Order'
                )
                ->addColumn(
                    'answer', Table::TYPE_TEXT,null, ['nullable' => true],
                    'Faq Answer'
                )
                ->addColumn(
                    'create_time',
                    Table::TYPE_DATETIME,
                    null,
                    ['nullable' => true],
                    'Create Time'
                )
                ->addColumn(
                    'update_time',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                    'Update Time'
                )
                ->addForeignKey(
                    $setup->getFkName(
                        $tableName, 'category_id', 'oc_faq_category',
                        'category_id'
                    ),
                    'category_id',
                    $setup->getTable('oc_faq_category'),
                    'category_id',
                    Table::ACTION_CASCADE
                )
                ->addIndex(
                    $setup->getIdxName(
                        $tableName,
                        ['sort_order']
                    ),
                    ['sort_order']
                )
                ->addIndex(
                    $setup->getIdxName(
                        $tableName,
                        ['status']
                    ),
                    ['status']
                )
                ->addIndex(
                    $setup->getIdxName(
                        $tableName,
                        ['store_ids']
                    ),
                    ['store_ids']
                )
                ->setComment('FAQ');
            $connection->createTable($table);


        }
    }


}
