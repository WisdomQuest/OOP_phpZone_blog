
<?php
//$execepltion = new Exception('Сообщение об ошибке', 123);
//throw $execepltion;

//try {
//    throw new Exception('Сообщение об ошибке', 123);
//
//} catch (Exception $e) {
//    echo 'Было поймано исключение: ' . $e->getMessage() . '. Код: ' . $e->getCode();
//}

function func1()
{
    try {
        // какой-то код
        func2();
    } catch (Exception $e) {
        echo 'Было поймано исключение: ' . $e->getMessage();
    }
    echo 'А теперь выполнится этот код';

}

function func2()
{
    // какой-то код
    func3();

}

function func3()
{
    //код, в котором возможна исключительная ситуация
    throw new Exception('Ошибка при подключении к БД');
    echo 'Этот код не выполнится, так как идет после места, где было брошено исключение';
}

func1();