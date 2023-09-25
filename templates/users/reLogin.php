<?php include __DIR__ . '/../header.php'; ?>



        <?php
if (!empty($user)):?>
Привет, <?=$user->getNickname ?> | <a href="http://oopphpzone/www/users/relogin" Выйти </a>
<?php else: ?>
    <a href="http://oopphpzone/users/Login" Войти </a> | <a href="http://oopphpzone/users/register" Зарегестрироваться </a>
<?php endif;?>
<?php include __DIR__ . '/../footer.php'; ?>