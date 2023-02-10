<?php

namespace Ylab\Helpers;

use Bitrix\Iblock\IblockTable;
use \Exception;

class IBlockHelpers
{
    /**
     * @param string $code
     * @return int
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getIBlockIdByCode(string $code): int
    {
        $IB = IblockTable::getList([
            'select' => ['ID'],
            'filter' => ['CODE' => $code],
            'limit' => '1',
            'cache' => ['ttl' => 3600],
        ]);
        $return = $IB->fetch();
        if (!$return) {
            throw new Exception('IBlock with code"' . $code . '" not found');
        }

        return (int)$return['ID'];
    }
}