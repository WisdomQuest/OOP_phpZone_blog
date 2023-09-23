<?php

class Rectandle implements calculatSquare
{
    private $x;
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculatSquare(): float
    {
        return $this->x * $this->y;
    }

}

class Square implements calculatSquare
{
    private $x;

    public function __construct(float $x)
    {
        $this->x = $x;
    }

    public function calculatSquare(): float
    {
        return $this->x ** 2;
    }

}

class  Cirle implements calculatSquare
{
    const PI = 3.1416;

    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculatSquare(): float
    {

        return self::PI * ($this->r ** 2);
    }
}

interface calculatSquare
{
    public function calculatSquare(): float;

//    public  function getId():int;
}

//$circle = new Cirle(2.5);
//var_dump($circle instanceof calculatSquare);

$objects = [
    new Square(5),
    new Rectandle(2, 4),
    new Cirle(5)

];

foreach ($objects as $object) {
    if ($object instanceof calculatSquare) {
        echo 'Объект реализует интерфейс calculatSquare. Площадь:' . $object->calculatSquare() .
            " принадлежит классу: " . get_class($object);
        echo '<br>';
    } else {
        echo "Объект класса: " . get_class($object) . " не реализует интерфейс CalculateSquare";
        echo '<br>';
    }
}

