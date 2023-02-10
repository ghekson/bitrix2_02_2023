<?php

namespace Mail\Manager;

use Mail\Manager\Orm\EmailsTable;
use Bitrix\Main\Localization\Loc;


/**
 * Class Profile
 * @package YLab\Mail
 */
class Profile
{
    /**
     * Список профилей
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function getProfiles()
    {
        $result = [];

        $result['HEADER']['ID'] = Loc::getMessage('YLAB_MAIL_MANAGER_PROFILE_HEAD_ID');
        $result['HEADER']['NAME'] = Loc::getMessage('YLAB_MAIL_MANAGER_PROFILE_HEAD_NAME');
        $result['HEADER']['EMAIL'] = Loc::getMessage('YLAB_MAIL_MANAGER_PROFILE_HEAD_EMAIL');

        $arParams = [
            'select' => [
                'ID',
                'NAME',
                'EMAIL'
            ]
        ];

        $oProfiles = EmailsTable::getList($arParams);

        if ($oProfiles->getSelectedRowsCount()) {
            while ($arProfile = $oProfiles->fetch()) {
                $result['PROFILES'][] = $arProfile;
            }
        }

        return $result;
    }

    /**
     * Получаем данные выбранного профиля
     * @param $iProfileID
     * @return bool
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function getProfile($iProfileID)
    {
        $arProfile = EmailsTable::getById($iProfileID)->fetchAll();

        if (isset($arProfile[0]['ID']) && is_numeric($arProfile[0]['ID'])) {
            return $arProfile[0];
        }

        return false;
    }

    /**
     * Добавляем профиль
     */
    public function addProfile($arFields)
    {
    }

    /**
     * Обновляем профиль
     */
    public function updateProfile($iProfileID, $arFields)
    {
    }

    /**
     * Удаляем профиль
     */
    public function deleteProfile($iProfileID)
    {
    }
}