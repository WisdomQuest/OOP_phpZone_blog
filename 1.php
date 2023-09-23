<?php

require __DIR__ . '/vendor/autoload.php';
class Cat
{
    private $name;


    private $color;


    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello()
    {
        echo "привет меня зовут " . $this->name . ". мой цвет: {$this->color} <br>";

    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getColor(): string
    {
        return $this->color;
    }
}


$cat1 = new Cat("barsik", "white");
$cat1->sayHello();

$cat2 = new Cat("barsic", "orange");
$cat2->sayHello();


$parser = new \Parsedown();
$parser->setBreaksEnabled(true);
echo $parser->text("<div><strong>*Some text*</strong></div>");

//$cat1->setColor("green");
//echo $cat1->getColor();

