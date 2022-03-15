<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>

<a class="brand-crums" href="/news">Назад</a>

<?php
$APPLICATION->IncludeComponent("main:detal_news", "news",
[
    "CODE" => $_GET["ELEMENT_CODE"],
]);
?>

<!-- <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?> -->
