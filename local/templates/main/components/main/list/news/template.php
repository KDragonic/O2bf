<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="text--news">
    <?php
    foreach ($arResult["ITEMS"] as $item) { ?>
    <div class="divBlock divBlock--text">
        <span class="divBlock-name"><a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item["NAME"] ?></a></span>
        <span class="divBlock-discription"><?= $item["PREVIEW_TEXT"]?></span>
        <span class="divBlock-date"><?= $item["DATE_CREATE"] ?></span>
    </div>
    <?php } ?>
</div>