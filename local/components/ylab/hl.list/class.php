<?php

use YLab\Components\ElementListComponent;

CBitrixComponent::includeComponentClass('ylab:element.list');

/**
 * Class CompanyListComponent
 * @package YLab\Components
 * Компонент отображения списка элементов нашего ИБ
 */
class CompanyListComponent extends ElementListComponent
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
        $this->arResult['ITEMS'] = $this->getElements();

        $this->includeComponentTemplate();
    }

    /**
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function getElements(): array
    {
        return $this->getDataFromHl('Company');
    }
}