<?php
//$url = '/post/nsdf/892';
//$pattern = '/\/([a-z]+)\/([0-9]+)/';
//
//preg_match($pattern, $url, $matches);
//
//$controller = $matches[1];
//$id = $matches[2];
//
//var_dump($controller);
//var_dump($id);


$pre = '/\/(?P<controller>[a-z]+)\/(?<id>[0-9]+)/m';
$url = '/post/sdfs/892';

preg_match($pre, $url, $matches);

$controller = $matches['controller'];
$id = $matches['id'];

var_dump($controller, $id);