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

    public function insertOne()
    {
        $sql = "INSERT INTO " .static::$table. " (title, text)
            VALUES (
             '" . $this->title . "',
             '" . $this->content . "')";

        $db = new DB;
        return $db->insert($sql);
    }

}
