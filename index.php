<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>

<div class="news">
    <div class="span--news">
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            [
                'AREA_FILE_SHOW' => 'file',
                "PATH" => SITE_DIR . "local/templates/main/include_area_1.php"
            ]
        );

        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            [
                'AREA_FILE_SHOW' => 'file',
                "PATH" => SITE_DIR . "local/templates/main/include_area_2.php"
            ]
        );

        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            [
                'AREA_FILE_SHOW' => 'file',
                "PATH" => SITE_DIR . "local/templates/main/include_area_3.php"
            ]
        );

        ?>
    </div>
        <?php
        $APPLICATION->IncludeComponent("main:list", "news",
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

<form id="feedback_form">
    <span>Форма обратной связи</span>
    <div class="box-boxs-input">
        <div class="box-input"><input type="text" name="name" id="name" placeholder="Введите имя" required><p class="error"></p></div>
        <div class="box-input"><input type="text" name="phone" id="phone" placeholder="+7(___)___-__-__" required><p class="error"></p></div>
    </div>
    <button type="submit">Отправить</button>
    <span class="index-form-complete-text-complete invisible">Форма успешно отправлена</span>
</form>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>