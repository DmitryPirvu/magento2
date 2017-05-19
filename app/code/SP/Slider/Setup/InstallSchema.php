<?php

namespace SP\Slider\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

use SP\Slider\Api\Data\CarouselInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable(CarouselInterface::CAROUSEL_TABLE)
        )->addColumn(
            CarouselInterface::CAROUSEL_ID,
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Carousel ID'
        )->addColumn(
            CarouselInterface::CAROUSEL_IMAGE,
            Table::TYPE_TEXT,
            255,
            [
                'nullable'  => false
            ],
            'Image'
        )->addColumn(
            CarouselInterface::CAROUSEL_ALT,
            Table::TYPE_TEXT,
            255,
            [
                'nullable'  => true,
                'default'   => null
            ],
            'Image Alt'
        )->setComment(
            'SP Slider table'
        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}