<?php

//class A
//{
//    public static function test(int $x)
//    {
//        return 'x = ' . $x;
//    }
//}
//
//echo A::test(5);

//class User
//{
//    private $role;
//
//    private $name;
//
//    public function __construct(string $role, string $name)
//    {
//        $this->role = $role;
//        $this->name = $name;
//    }
//
//    public static function createAdmin(string $name)
//    {
//        return new self('admin', $name);
//    }
//
//}
//
////$admin = new User('admin', 'Vano');
//
//$admin = User::createAdmin('Vano');
//var_dump($admin);

//class A
//{
//    public static $x;
//
//
//    public static function getX()
//    {
//        return self::$x;
//    }
//}
//
//A::$x = 5;
//$a = new A();
//var_dump($a::getX());

class Human
{
    private static $count = 0;

    public function __construct()
    {
        return self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }
}

$human1 = new Human();
$human2 = new Human();
$human3 = new Human();


echo 'Людей уже '  . Human::getCount();