<?php

//function inverse($x) {
//    if (!$x) {
//        throw new Exception('Деление на ноль.');
//    }
//    return 1/$x;
//}
//
//try {
//    echo inverse(5) . "\n";
//    echo inverse(0) . "\n";
//} catch (Exception $a) {
//    echo 'Выброшено исключение: ',  $a->getMessage(), "\n";
//}
//
//// Продолжение выполнения
//echo "Привет, мир\n";


//function a($x)
//{
//    if ($x==null) {
//        throw new Exception('boo');
//    }
//}
//
//try {
//    echo 'gi';
//    a(0);
//    a(2);
//
//} catch (Exception $e) {
//    $x=3;
//    echo $x . $e->getMessage();
//}
//$a='';
//$b ='';
$token = "123:abc";
[$userId, $authToken] = explode(':', $token, 2);

echo $userId . '<br>'. $authToken;








//function numbers(int $x) {
//    if ($x == 0) {
//        echo $x;
//        return;
//    }
//    numbers($x - 1);
//    echo ', ' . $x;
//}
//
//numbers(3);

//function minNumber($a, $b, $c)
//{
//    $a < $b ? $min = $a : $min = $b;
//    $c < $min ? $min = $c : '';
//    echo $min . '<br>';
//
//}
//
//minNumber(8, 13, 9);
//
//
//$a = 3;
//$b = 11;
//function umnoz(&$a, &$b)
//{
//    $a *= 2;
//    $b *= 2;
//}
//
//umnoz($a, $b);
//echo $a . '<br>' . $b . '<br>';
//
//
//function factorialNum(int $num)
//{
//    if ($num == 1) {
//        return 1;
//    }
//    return $num * factorialNum($num - 1);
//
//}
//
//echo factorialNum(4);
//echo '<hr>';
//
//
//function evenNum($num)
//{
//    if ($num % 2 == 0) {
//        echo $num . ' ';
//    }
//    if ($num==1) {
//        return 1;
//    }
//    return evenNum($num - 1);
//}
//evenNum(6);

//$array1=
//    ['array2'=>
//    ['array3'=>
//        []
//    ]
//    ];
////$array1=['array2'=>[]];
//
//
//var_dump($array1['array2']['array3']= 'hi');
////var_dump($array1);


//$string ='';
//$array = [1, 3, 2];
//asort($array);
//$str = implode((string)':', (array)$array
//);
//var_dump($str);
//
//$array2 = [1, 2, 3, 4, 5];
//
//$arr3 = array_slice(
//    $array2,
//    1,
//    3,
//);
//
//var_dump($arr3);


//trim — Удаляет пробелы (или другие символы) из начала и конца строки
//str_replace — Заменяет все вхождения строки поиска на строку замены
//str_split — Преобразует строку в массив
//explode — Разбивает строку с помощью разделителя
//array_unique — Убирает повторяющиеся значения из массива

//$line = '0 2 3 1 2';
//
//
////$line=implode(' ',array_unique(explode(' ',$line)));
//$nums = explode(' ', $line);
//
//$numsPrinted = [];
//foreach ($nums as $num) {
//    if (!isset($numsPrinted[$num])) {
//        $numsPrinted[$num] = true;
//        echo $num . ' ';
//    }
//}
//
//var_dump($line);

//?>
<!--<html>-->
<!--<head>-->
<!--    <title>Форма входа</title>-->
<!--</head>-->
<!--<body>-->
<!--<form action="/login.php" method="post">-->
<!--    <label>-->
<!--Логин <input type="text" name="login">-->
<!--    </label>-->
<!--    <br>-->
<!--    <label>-->
<!--Пароль <input type="password" name="password">-->
<!--    </label>-->
<!--    <br>-->
<!--    <input type="submit" value="Войти">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->


