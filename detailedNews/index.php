<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>

<a class="brand-crums" href="/news">Назад</a>
<div class="fill-news--news">
    <div class="text--news">
        <div class="fill-news--divBlock">
            <span class="fill-news--divBlock-name">
                <?= $item["NAME"] ?>
            </span>
            <span class="fill-news--divBlock-date">
                <?= $item["DATE"] ?>
            </span>
            <span class="fill-news--divBlock-discription">
            <?= $item["TEXT"] ?>
            </span>
        </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>