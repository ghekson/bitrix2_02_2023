<?php

namespace Sprint\Migration;


class IB_POSITIONS20230202170901 extends Version
{
    /** @var string $description */
    protected $description = "Добавим ИБ Позиции";

    /** @var string $moduleVersion */
    protected $moduleVersion = "4.2.4";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->saveIblockType([
            'ID' => 'ylab',
            'SECTIONS' => 'Y',
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'IN_RSS' => 'N',
            'SORT' => '500',
            'LANG' =>
                [
                    'ru' =>
                        [
                            'NAME' => 'YLab',
                            'SECTION_NAME' => 'YLab разделы',
                            'ELEMENT_NAME' => 'YLab элементы',
                        ],
                    'en' =>
                        [
                            'NAME' => 'YLab',
                            'SECTION_NAME' => 'YLab sections',
                            'ELEMENT_NAME' => 'YLab elemets',
                        ],
                ],
        ]);
        $iblockId = $helper->Iblock()->saveIblock([
            'IBLOCK_TYPE_ID' => 'ylab',
            'LID' =>
                [
                    0 => 's1',
                ],
            'CODE' => 'positions',
            'API_CODE' => 'positions',
            'REST_ON' => 'N',
            'NAME' => 'Позиции',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'LIST_PAGE_URL' => '#SITE_DIR#/ylab/index.php?ID=#IBLOCK_ID#',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/ylab/detail.php?ID=#ELEMENT_ID#',
            'SECTION_PAGE_URL' => '#SITE_DIR#/ylab/list.php?SECTION_ID=#SECTION_ID#',
            'CANONICAL_PAGE_URL' => '',
            'PICTURE' => null,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'RSS_TTL' => '24',
            'RSS_ACTIVE' => 'Y',
            'RSS_FILE_ACTIVE' => 'N',
            'RSS_FILE_LIMIT' => null,
            'RSS_FILE_DAYS' => null,
            'RSS_YANDEX_ACTIVE' => 'N',
            'XML_ID' => null,
            'INDEX_ELEMENT' => 'Y',
            'INDEX_SECTION' => 'Y',
            'WORKFLOW' => 'N',
            'BIZPROC' => 'N',
            'SECTION_CHOOSER' => 'L',
            'LIST_MODE' => '',
            'RIGHTS_MODE' => 'S',
            'SECTION_PROPERTY' => 'N',
            'PROPERTY_INDEX' => 'N',
            'VERSION' => '1',
            'LAST_CONV_ELEMENT' => '0',
            'SOCNET_GROUP_ID' => null,
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'SECTIONS_NAME' => 'Разделы',
            'SECTION_NAME' => 'Раздел',
            'ELEMENTS_NAME' => 'Элементы',
            'ELEMENT_NAME' => 'Элемент',
            'EXTERNAL_ID' => null,
            'LANG_DIR' => '/',
            'SERVER_NAME' => 'bitrix2.local',
            'IPROPERTY_TEMPLATES' =>
                [],
            'ELEMENT_ADD' => 'Добавить элемент',
            'ELEMENT_EDIT' => 'Изменить элемент',
            'ELEMENT_DELETE' => 'Удалить элемент',
            'SECTION_ADD' => 'Добавить раздел',
            'SECTION_EDIT' => 'Изменить раздел',
            'SECTION_DELETE' => 'Удалить раздел',
        ]);

        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => 'Цена',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'PRICE',
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
            'NAME' => 'Процент',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'PERCENT',
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
            'NAME' => 'Статус',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'STATUS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'L',
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
            'VALUES' =>
                [
                    0 =>
                        [
                            'VALUE' => 'В работе',
                            'DEF' => 'N',
                            'SORT' => '500',
                            'XML_ID' => 'in_work',
                        ],
                    1 =>
                        [
                            'VALUE' => 'Выполнено',
                            'DEF' => 'N',
                            'SORT' => '600',
                            'XML_ID' => 'done',
                        ],
                ],
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

        $helper->Iblock()->deletePropertyIfExists($iblockId, ['PRICE', 'PERCENT', 'STATUS']);
    }
}
