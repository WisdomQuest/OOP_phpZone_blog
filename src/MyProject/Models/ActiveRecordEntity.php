<?php

namespace MyProject\Models;

use MyProject\Services\Db;
use mysql_xdevapi\Statement;

abstract class ActiveRecordEntity implements \JsonSerializable
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    //вывод всей таблицы в зависимости от того в каком классе был вызван
    public static function findALl(): array
    {
        $db = Db::getInstanse();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    // должен вернуть строку – имя таблицы.
    // Т.к метод абстрактный, то все сущности, которые будут наследоваться от этого класса, должны будут его реализовать.
    abstract protected static function getTableName(): string;

    public static function getById(int $id): ?self
    {
        $db = Db::getInstanse();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;

    }

    public function save(): void
    {
        $mappedPropeties = $this->mapPropertiesToDbFormat();

        if ($this->id !== null) {
            $this->update($mappedPropeties);
        } else {
            $this->insert($mappedPropeties);
        }

//        var_dump($mappedPropeties);
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedPropeties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedPropeties[$propertyNameAsUnderscore] = $this->$propertyName;
        }
        return $mappedPropeties;
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

//здесь мы обновляем существующую запись в базе
    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index; // :param1
            $columns2params[] = $column . ' = ' . $param; // column1 = :param1
            $params2values[$param] = $value; // [:param1 => value1]
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstanse();
        $db->query($sql, $params2values, static::class);

    }

    //здесь мы создаём новую запись в базе
    private function insert(array $mappedProperties): void
    {
        $filtreredProperties = array_filter($mappedProperties);
//        var_dump($filtreredProperties);

        $columns = [];
        $paramNames = [];
        foreach ($filtreredProperties as $columnName => $value) {
            $columns[] = '`' . $columnName . '`';
            $paramName = ':' . $columnName;
            $paramNames[] = $paramName;
            $param2values[$paramName] = $value;
        }
//        var_dump($columns);
//        var_dump($paramNames);
//        var_dump($param2values);

        $columnsViaSemicolon = implode(', ', $columns);
        $paramNameViaSemicolon = implode(', ', $paramNames);

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramNameViaSemicolon . ');';
//        var_dump($sql);

        $db = Db::getInstanse();
        $db->query($sql, $param2values, static::class);
        $this->id = $db->getLastInsertId();
        $this->refresh();

    }


    private function refresh(): void
    {
        $objectFormDb = static::getById($this->id);
        $reflector = new \ReflectionObject($objectFormDb);
        $properties = $reflector->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $this->$propertyName = $property->getValue($objectFormDb);
        }
    }

    public function delete(): void
    {
        $db = Db::getInstanse();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $this->id]
        );
        $this->id = null;
    }

    public static function findOneByColumn(string $columnName, $value): ?self
    {
        $db = Db::getInstanse();
        $result = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE `' . $columnName . '` = :value LIMIT 1;',
            [':value' => $value],
            static::class
        );
        if ($result === []) {
            return null;
        }
        return $result[0];
    }

    public function jsonSerialize(): mixed
    {
        // TODO: Implement jsonSerialize() method.
        return $this->mapPropertiesToDbFormat();
    }

    //метод для получения количества страниц
    public static function getPagesCount(int $itemPerPage)
    {
        $db = Db::getInstanse();
        $result = $db->query('SELECT COUNT(*) AS cnt FROM ' . static::getTableName() . ';');
        return ceil($result[0]->cnt / $itemPerPage);

    }

//метод для получения записей на n-ой страничке
    public static function getPage(int $pageNum, int $itemPerPage):array
    {
        $db = Db::getInstanse();
            return $db->query(
            sprintf(
                'SELECT * FROM `%s` ORDER BY id LIMIT %d OFFSET %d;',
                static::getTableName(),
                $itemPerPage,
                ($pageNum -1)* $itemPerPage
            ),
            [],
            static::class
        );

    }

    public static function itemPerPage()
    {
        return $itemPerPage = 5;
    }

}
