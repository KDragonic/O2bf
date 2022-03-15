<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class ListElements extends CBitrixComponent{

    public function executeComponent()
	{
        if(!\Bitrix\Main\Loader::includeModule("iblock"))
        return;

    $this->arResult["NAV_OBJECT"] = new \Bitrix\Main\UI\PageNavigation("nav-news");
    $this->arResult["NAV_OBJECT"]->allowAllRecords(true)
        ->setPageSize($this->arParams["COUNT"])
        ->initFromUri();

    $arFilter = array(
        'IBLOCK_ID' => $this->arParams["IBLOCK_ID"],
        'ACTIVE' => 'Y',
    );

    $res = CIBlockElement::GetList(
        [],
        $arFilter,
        false,
        [
            "nPageSize" => $this->arResult["NAV_OBJECT"]->getPageSize(),
            "iNumPage" => $this->arResult["NAV_OBJECT"]->getCurrentPage()
        ],
        $this->arParams['PROPERTY_CODE']
    );


    $this->arResult["NAV_OBJECT"]->setRecordCount($res->SelectedRowsCount());
    while($element = $res->GetNext()) {
        $this->arResult["ITEMS"][$element["ID"]] = $element;
        $this->arResult["ITEMS"][$element["ID"]]["PREVIEW_TEXT"] = mb_strimwidth($this->arResult["ITEMS"][$element["ID"]]["PREVIEW_TEXT"], 0, 120, "...");
        $this->arResult["ITEMS"][$element["ID"]]["DATE_CREATE"] = $this->replaceDateRu($this->arResult["ITEMS"][$element["ID"]]["DATE_CREATE"]);
    }

    // $this->arResult["ITEMS"] = CIBlockElement::GetList([], $arFilter);
    $this->includeComponentTemplate();
    return $this->arResult;
    }

    public function replaceDateRu($date_text)
    {
        $_monthsList = [
            ".01."  => "января",
            ".02." => "февраля",
            ".03." => "марта",
            ".04."  => "апреля",
            ".05." => "мая",
            ".06." => "июня",
            ".07."  => "июля",
            ".08." => "августа",
            ".09." => "сентября",
            ".10."  => "октября",
            ".11." => "ноября",
            ".12." => "декабря"
        ];
        $time = strtotime($date_text); // переводит из строки в дату
        $currentDate = date("d.m.Y\года", $time);
        $_mD = date(".m.", $time);
        $normalMonth = " ".$_monthsList[$_mD]." ";
        return str_replace($_mD, $normalMonth, $currentDate); //формате 22 июня 2015
    }
}