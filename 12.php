<?php






























//$url = '/post/892';
//$pattern= '~/(?P<controller>[a-z]+)/(?P<articleId>[0-9]+)~m';
//preg_match($pattern ,$url,$mat);
//var_dump($mat);

//$parol = password_hash('parol',PASSWORD_DEFAULT);
//echo $parol. '<br>';
//
//var_dump(password_verify('parol','$2y$10$wZGpxE9dAvEE7dSehqJ32.8zR10tjn/QfSjpKW2tfOMOU/agMkbK2'));

//echo memory_get_usage(). "\n";
//
//$a = str_repeat("Hello",4242);
//echo memory_get_usage(). "\n";
//unset($a);
//echo memory_get_usage(). "\n";

//function convert($size)
//{
//    $unit=array('b','kb','mb','gb','tb','pb');
//    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
//}
//
//echo convert(memory_get_usage(true));
//
//echo memory_get_usage() . "<br>";
//echo memory_get_usage(true);

//function echoMemoryUsage()
//{
//    echo 'Requested: ' . (int)(memory_get_usage()/1024) . 'kb';
//    echo PHP_EOL . '';
//    echo 'Allocated: ' . (int)(memory_get_usage(true)/1024) . 'kb';
//    echo PHP_EOL . PHP_EOL;
//}
//
//echoMemoryUsage();
//
//$bigString = str_repeat('f', 100000000);
//
//echoMemoryUsage();
//
//unset($bigString);
//
//echoMemoryUsage();
//
//echo 'Peak requested ' . (int)(memory_get_peak_usage()/1024) . ' KB';
//echo PHP_EOL;
//echo 'Peak allocated ' . (int)(memory_get_peak_usage()/1024) . ' KB';

//$var1 = 123;
//$var2 = &$var1;
//$var1 = 12345;
////unset($var1);
////echo $var2;
//xdebug_debug_zval('var1');

//function func($obj)
//{
//    $obj->prop = 123;
//}
//$obj = new stdClass();
//$obj->prop = 1;
//func($obj);
//var_dump($obj);
//xdebug_debug_zval('obj');


//class Db {
//    private $dbhost;
//
//    public function __construct(Config $config)
//    {
//        $this->dbhost = $config->db->host;
//    }
//}

//$arr = [1, 2, 3];
//$arr2 = array_map(function ($item) {
//    return $item * 2;
//}, $arr);
////array_walk($arr, function (&$item) {
////    $item *= 2;});
////var_dump($arr2);
////var_dump($arr);
//
//xdebug_debug_zval('arr');
//
//$a = 123;
//$b = $a;
//xdebug_debug_zval('a');

//$a = [];
//$a[] = &$a;
//
//xdebug_debug_zval('a');

//$a = [];
//echo (int)(memory_get_usage() / 1024) . ' KB' . PHP_EOL;
//$a[] = str_repeat('a', 100000);
////$a[] = &$a;
//echo (int)(memory_get_usage() / 1024) . ' KB' . PHP_EOL;
//unset($a);
//echo (int)(memory_get_usage() / 1024) . ' KB' . PHP_EOL;

//$i = 0;
//while (true) {
//    $obj = new stdClass();
//    $obj->foo = $obj;
//    if ($i++ % 1000 === 0) {
//        echo (int)(memory_get_usage() / 1024) . ' KB' . PHP_EOL;
//    }
//}

//mail('sofronovpv89@mail.ru', 'Тема письма', 'Текст письма', 'From: ryswelinix@gmail.com');

//file_put_contents('D:\\1.log', date(DATE_ISO8601) . PHP_EOL, FILE_APPEND);
//
//for ($i=0; $i<=2; $i++) {
////            sleep($this->getParam('sleep'));
////            file_put_contents('D:\\1.log', date(DATE_ISO8601) . $this->getParam('sleep'). PHP_EOL, FILE_APPEND);
//    echo'sleep';
//}