<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>

<div class="news">
    </div>
        <?php
        $APPLICATION->IncludeComponent("main:list", "full_news",
        [
            "IBLOCK_ID" => 1,
            "COUNT" => 3,
            "PROPERTY_CODE" =>
            [
                'ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', "DATE_CREATE", "DETAIL_PAGE_URL"
            ]
        ]);
        ?>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>