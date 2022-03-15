<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="fill-news--news">
    <div class="text--news">
        <div class="fill-news--divBlock">
            <span class="fill-news--divBlock-name">
                <?= $arResult["ITEM"]["NAME"] ?>
            </span>
            <span class="fill-news--divBlock-date">
                <?= $arResult["ITEM"]["DATE_CREATE"] ?>
            </span>
            <span class="fill-news--divBlock-discription">
            <?= $arResult["ITEM"]["PREVIEW_TEXT"] ?>
            </span>
        </div>
</div>