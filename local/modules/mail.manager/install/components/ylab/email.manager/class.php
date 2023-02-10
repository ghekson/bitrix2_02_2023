<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Mail\Manager\Profile;
use Bitrix\Main\Loader;


/**
 * Class ProfileManager
 */
class EmailManagerComponent extends CBitrixComponent
{
    /**
     * @return mixed|void
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function executeComponent()
    {
        Loader::includeModule('mail.manager');

        $profile = new Profile();

        $this->arResult = $profile->getProfiles();

        $this->includeComponentTemplate();
    }
}