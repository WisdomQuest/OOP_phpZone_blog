<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> <?= $title ?? 'Мой блог'?>  </title>
    <link rel="stylesheet" href="/www/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
<!--            --><?php //= !empty($user) ? 'Привет, ' . $user->getNickname() : 'Войдите на сайт' ?>
            <?= !empty($user) ? 'Привет, ' . $user->getNickname() . ' | <a href="http://oopphpzone/www/users/relogin">Выйти</a>' : '<a href="http://oopphpzone/www/users/login">Войти на сайт</a> | <a href="http://oopphpzone/www/users/register">Регистрация</a>'  ?>

           <?= !empty($user) && $user->isAdmin() ?  '|| <a href="http://oopphpzone/www/admin">Админка</a>':'' ?>

        </td>
    </tr>
    <tr>
        <td>
