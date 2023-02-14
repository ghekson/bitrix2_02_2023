<?php

namespace Mail\Manager; 

/**
 * На лекции вы говорите, что в namespace подключается модуль Mail\Manager
 * orm убрал.
 */

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;

/**
 * Class ProfilesTable
 * @package app\Orm
 */
class EmailsTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     * @return string
     */
    public static function getTableName()
    {
        return 'b_forum_email';
    }

 /**
 * таблица b_forum_email из пункта 1
 * 
 */
    
    
    
    /**
     * Returns entity map definition.
     * @return array
     * @throws \Exception
     */
    public static function getMap()
    {
        return [
            new Entity\IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true,
                'title' => 'ID',
            ]),
            new Entity\StringField('EMAIL', [
                'validation' => [__CLASS__, 'validateName'],
                'title' => Loc::getMessage('YLAB_MAIL_MANAGER_PROFILE_EMAIL_FIELD'),
            ]),
           
        ];
    }
