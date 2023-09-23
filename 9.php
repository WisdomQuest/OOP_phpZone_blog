<?php


function sum($a, $b)
{

    return $a + $b;
}
//создадим объект-рефлектор
$sumReflector = new ReflectionFunction('sum');



//echo $sumReflector->getStartLine();
//echo $sumReflector->getDocComment();

function convertToSnakeCase($string) {
    $snakeCase = preg_replace_callback('/([A-Z])/', function($matches) {
        return '_' . strtolower($matches[0]);
    }, $string);

    return ltrim($snakeCase, '_');
}

// Пример использования функции
$authorId = 'authorId';
$convertedString = convertToSnakeCase($authorId);
echo $convertedString; // выводит "author_id"