<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
    <?$APPLICATION->ShowHead();?>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?$APPLICATION->ShowTitle();?></title>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/style.css">
    <script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/jquery.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/assets/js/send.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<!-- <div id="panel">  <?php  // $APPLICATION->ShowPanel();  ?></div> -->
<body>
    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/scr/logo.svg" alt="logo.svg">
        <?$APPLICATION->IncludeComponent("bitrix:menu","myMenu",
        [
            "ROOT_MENU_TYPE" => "top",
            "MAX_LEVEL" => "1",
            "CHILD_MENU_TYPE" => "top",
            "USE_EXT" => "Y",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N", //Y
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => ""
        ]);?>
    <main>