<?php
$login = !empty($_POST['login']) ? $_POST['login'] : '';
$password = !empty($_POST['password']) ? $_POST['password'] : '';
?>
<html>
<head>
    <title>Обработка POST-запроса</title>
</head>
<body>
<p>
    Переданный login: <?= $login ?>
    <br>
    Переданный password: <?= $password ?>
</p>
</body>
</html>