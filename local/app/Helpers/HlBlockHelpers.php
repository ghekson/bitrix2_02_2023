<?php

namespace Ylab\Helpers;

use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;

/**
 * Набор методов хелперов для работы с HL-блоками
 */
class HlBlockHelpers
{
    /**
     * Метод для получения класса HL-Блока по символьному коду
     * @param string $sHlCode
     * @return \Bitrix\Main\ORM\Data\DataManager|string
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getHlEntityClass(string $sHlCode)
    {
        Loader::includeModule('highloadblock');

        $hlBlock = HL\HighloadBlockTable::getList(
            [
                'filter' => ['=NAME' => $sHlCode]
            ]
        )->fetch();

        $sEntityDataClass = '';

        if (!empty($hlBlock)) {
            $entity = HL\HighloadBlockTable::compileEntity($hlBlock);
            $sEntityDataClass = $entity->getDataClass();
        }

        return $sEntityDataClass;
    }
}