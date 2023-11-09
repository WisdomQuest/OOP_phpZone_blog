<?php

namespace MyProject\Services;

use MyProject\Exceptions\DbException;

class Db
{
//    private static $instancesCount = 0;
    private static $instance;

    private $pdo;


    private function __construct()
    {
//        self::$instancesCount++;

        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];
        try {
            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAMES UTF8');

        } catch (\PDOException $e) {
            throw new DbException('Ошибка при подключении к базе данных:' . $e->getMessage());
        }

    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
//        var_dump( $sql);
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

//    public static function getInstancesCount(): int
//    {
//        return self::$instancesCount;
//    }


//обращение к базе данных
    public static function getInstanse(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }




    //Для того, чтобы получить id последней вставленной записи в базе (в рамках текущей сессии работы с БД)
    // можно использовать метод lastInsertId() у объекта PDO

    //PDO::lastInsertId — Возвращает ID последней вставленной строки или значение последовательности

    public function getLastInsertId(): int
    {
        return (int)$this->pdo->lastInsertId();
    }

}

