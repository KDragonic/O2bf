<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class DetalNews extends CBitrixComponent{

    public function executeComponent()
	{
        if(!\Bitrix\Main\Loader::includeModule("iblock"))
        return;

        $arFilter = [ 'CODE' => $this->arParams["CODE"] ];

        $res = CIBlockElement::GetList(
            [],
            $arFilter,
            false,
            false,
            [
                "PREVIEW_TEXT",
                "NAME",
                "DATE_CREATE"
            ]
        );
        // print_r($res[0]["NAME"]);
        $this->arResult["ITEM"] = $res->GetNext();

        // $this->arResult["ITEMS"] = CIBlockElement::GetList([], $arFilter);
        $this->includeComponentTemplate();
        return $this->arResult;
    }
}