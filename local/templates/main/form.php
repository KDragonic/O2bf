<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<form action="form.php" method="post">
<span>Форма обратной связи</span>
<div class="box-boxs-input">
    <div class="box-input"><input type="text" name="name" placeholder="Введите имя"><p></p></div>
    <div class="box-input"><input type="text" name="phone" placeholder="+7(___)___-__-__"><p>Error: invalid phone number</p></div>
</div>
<button type="submit">Отправить</button>
</form>