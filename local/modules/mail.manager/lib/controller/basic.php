<?php
namespace Mail\Manager\Controller;

use Bitrix\Main\Engine\ActionFilter\Authentication;
use Bitrix\Main\Engine\ActionFilter\HttpMethod;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\Response\AjaxJson;

/**
 * Класс-контроллер содержит один метод для проверки работоспособности контроллеров.
 * Можно обратиться из консоли браузера:
 * ```
 * BX.ajax.runAction('mail:manager.basic.version')
 * ```
 *
 * Class Basic
 * @package YLab\Controller
 */
class Basic extends Controller
{
    /**
     * @inheritDoc
     * @return array
     */
    public function configureActions()
    {
        $defaultFilters = [
            new Authentication(),
            new HttpMethod([HttpMethod::METHOD_POST])
        ];

        return [
            'versionAction' => [
                'prefilters' => $defaultFilters
            ],
        ];
    }

    /**
     * Метод возвращает тестовое сообщение
     * @return AjaxJson
     */
    public function versionAction($id, $name): AjaxJson
    {
        return AjaxJson::createSuccess(['version' => '1.0.0']);
    }
}