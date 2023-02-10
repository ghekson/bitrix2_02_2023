<?php

namespace Sprint\Migration;

/**
 * Для ИБ Позиции добавим набор полей
 */
class IB_POSITIONS_add_fieds20230209185212 extends Version
{
    /** @var string $description */
    protected $description = "Для ИБ Позиции добавим набор полей";

    /** @var string $moduleVersion */
    protected $moduleVersion = "4.2.4";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists('positions', 'ylab');

        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => 'Вес',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'WEIGHT',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'N',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => null,
            'HINT' => '',
        ]);
        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => '№ по номенклатуре',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'NUMBER_ACT',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => null,
            'USER_TYPE_SETTINGS' => null,
            'HINT' => '',
        ]);
        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => 'Заказ',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'ORDER',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => null,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => 'directory',
            'USER_TYPE_SETTINGS' =>
                [
                    'size' => 1,
                    'width' => 0,
                    'group' => 'N',
                    'multiple' => 'N',
                    'TABLE_NAME' => 'ylab_orders',
                ],
            'HINT' => '',
            'FEATURES' =>
                [
                    0 =>
                        [
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ],
                    1 =>
                        [
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ],
                ],
        ]);

    }

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function down()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists('positions', 'ylab');

        $helper->Iblock()->deletePropertyIfExists($iblockId, ['WEIGHT', 'NUMBER_ACT', 'ORDER']);
    }
}
