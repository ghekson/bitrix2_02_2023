<?php

namespace YLab\Components;

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;
use \CBitrixComponent;
use \CIBlockElement;
use \Exception;
use Ylab\Helpers\HlBlockHelpers;

/**
 * Class ElementListComponent
 * @package YLab\Components
 * Компонент отображения списка элементов нашего ИБ
 */
class ElementListComponent extends CBitrixComponent
{
    /** @var int $idIBlock ID информационого блока */
    private $idIBlock;

    /** @var string $hlTemplateName Имя шаблона для отображения HL */
    private $hlTemplateName = 'hl';

    /**
     * Метод executeComponent
     *
     * @return mixed|void
     * @throws Exception
     */
    public function executeComponent()
    {
        Loader::includeModule('iblock');

        $this->idIBlock = 4;

        if ($this->getTemplateName() == $this->hlTemplateName) {
            $this->arResult['ITEMS'] = $this->getDataFromHl();
        } else {
            $this->arResult['ITEMS'] = $this->getElements();
        }

        $this->includeComponentTemplate();
    }

    /**
     * Получим элементы ИБ
     * @return array
     */
    public function getElements(): array
    {
        $result = [];

        $arFilter = [
            'IBLOCK_ID' => $this->idIBlock
        ];

        $arCurSort = ['ID' => 'DESC'];

        $elements = CIBlockElement::GetList(
            $arCurSort,
            $arFilter,
            false,
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'PROPERTY_PRICE', 'PROPERTY_PERCENT', 'PROPERTY_STATUS']
        );

        while ($element = $elements->GetNext()) {

            $total = $this->calcTotal($element);

            $result[] = [
                'ID' => $element['ID'],
                'NAME' => $element['NAME'],
                'PRICE' => $element['PROPERTY_PRICE_VALUE'],
                'PERCENT' => $element['PROPERTY_PERCENT_VALUE'],
                'TOTAL' => $total,
                'STATUS' => $element['PROPERTY_STATUS_VALUE'],
            ];
        }

        return $result;
    }

    /**
     * Определим итоговую цену
     * @param array $element
     * @return string
     */
    private function calcTotal(array $element): string
    {
        $result = Loc::getMessage('YLAB.ELEMENT.LIST.CLASS.NO_TOTAL');

        if ($this->arParams['CALC_TOTAL'] === 'Y') {
            $result = round(((int)$element['PROPERTY_PRICE_VALUE'] * (int)$element['PROPERTY_PERCENT_VALUE']) / 100) . Loc::getMessage('YLAB.ELEMENT.LIST.CLASS.RUB');
        }

        return $result;
    }

    /**
     * Получим список заказов
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    private function getDataFromHl(): array
    {
        $entityClass = HlBlockHelpers::getHlEntityClass('Orders');

        $ordersList = $entityClass::getList([
            'select' => ['*'],
            'filter' => [],
            'order' => ['UF_SUM'],
        ]);

        $orders = $ordersList->fetchAll();

        return is_array($orders) ? $orders : [];
    }
}
