<?php

abstract class AbstractModel
{
    protected static $table;
    protected static $class;

    public static function getAll()
    {
        $db = new DB;
        return $db->queryAll('SELECT * FROM ' . static::$table, static::$class);
    }

    public static function getOne($id)
    {
        $db = new DB;
        return $db->queryOne('SELECT * FROM ' .static::$table. ' WHERE id = ' . $id, static::$class);
    }

    public static function insertOne($data)
    {
        $keys = array_keys($data);
        $values = array_values($data);
        $field = '`'.implode('`, `', $keys).'`';
        $value = "'".implode("', '", $values)."'";

        $sql = "INSERT INTO ".static::$table." ($field) VALUES ($value)";

        $db = new DB;
        return $db->insert($sql);
    }

}
