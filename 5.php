<?php

//abstract class AbstractClass
//{
//abstract public function getValue();
//
//    public function printValue()
//    {
//        echo 'Значение: ' . $this->getValue();
//    }
//
//}
//
//class A extends AbstractClass
//{
//
//    private $value;
//
//    public function  __construct(string $value)
//    {
//        $this->value=$value;
//    }
//
//    public function getValue()
//    {
//        return $this->value;
//    }
//
//}

//$object = new A('kek');
//$object->printValue();

abstract class HumanAbstract
{
    private $name;
    public function __construct(string $name)
{
    $this->name=$name;
}

    public function getName()
    {
        return $this->name;
    }

    abstract public function getGreeting(): string;
    abstract public function getMyNameIs(): string;

    public function inroduceYourself(): string
    {
        return $this->getGreeting() . '!' . $this->getMyNameIs() . ' ' . $this->getName() . '.' . '<br>';      }
}

class RussianHuman extends HumanAbstract
{
//    private $getGreeting;



    public function getGreeting(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }

}class EnglishHuman extends HumanAbstract
{
//    private $getGreeting;



    public function getGreeting(): string
    {
        return 'Hello';
    }

    public function getMyNameIs(): string
    {
        return 'My name is ';
    }
}

$object1 = new RussianHuman('Иван');
echo $object1->inroduceYourself();

$object2 = new EnglishHuman('Jhon');
echo  $object2->inroduceYourself();