<?php

namespace Sprint\Migration;

/**
 * HL Компании
 */
class HL_COMPANY20230209185120 extends Version
{
    /** @var string $description */
    protected $description = "HL Компании";
    /** @var string $moduleVersion */
    protected $moduleVersion = "4.2.4";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock([
            'NAME' => 'Company',
            'TABLE_NAME' => 'ylab_company',
            'LANG' =>
                [
                    'ru' =>
                        [
                            'NAME' => 'Компании',
                        ],
                    'en' =>
                        [
                            'NAME' => 'Company',
                        ],
                ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_NAME',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' =>
                [
                    'SIZE' => 20,
                    'ROWS' => 1,
                    'REGEXP' => '',
                    'MIN_LENGTH' => 0,
                    'MAX_LENGTH' => 0,
                    'DEFAULT_VALUE' => '',
                ],
            'EDIT_FORM_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'Название',
                ],
            'LIST_COLUMN_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'Название',
                ],
            'LIST_FILTER_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'Название',
                ],
            'ERROR_MESSAGE' =>
                [
                    'en' => '',
                    'ru' => '',
                ],
            'HELP_MESSAGE' =>
                [
                    'en' => '',
                    'ru' => '',
                ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_DESCRIPTIONS',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' =>
                [
                    'SIZE' => 20,
                    'ROWS' => 1,
                    'REGEXP' => '',
                    'MIN_LENGTH' => 0,
                    'MAX_LENGTH' => 0,
                    'DEFAULT_VALUE' => '',
                ],
            'EDIT_FORM_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'Описание',
                ],
            'LIST_COLUMN_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'Описание',
                ],
            'LIST_FILTER_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'Описание',
                ],
            'ERROR_MESSAGE' =>
                [
                    'en' => '',
                    'ru' => '',
                ],
            'HELP_MESSAGE' =>
                [
                    'en' => '',
                    'ru' => '',
                ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_INN',
            'USER_TYPE_ID' => 'double',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' =>
                [
                    'PRECISION' => 4,
                    'SIZE' => 20,
                    'MIN_VALUE' => 0.0,
                    'MAX_VALUE' => 0.0,
                    'DEFAULT_VALUE' => null,
                ],
            'EDIT_FORM_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'ИНН',
                ],
            'LIST_COLUMN_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'ИНН',
                ],
            'LIST_FILTER_LABEL' =>
                [
                    'en' => '',
                    'ru' => 'ИНН',
                ],
            'ERROR_MESSAGE' =>
                [
                    'en' => '',
                    'ru' => '',
                ],
            'HELP_MESSAGE' =>
                [
                    'en' => '',
                    'ru' => '',
                ],
        ]);
    }

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function down()
    {
        $this->getHelperManager()->Hlblock()->deleteHlblockIfExists('Company');
    }
}
