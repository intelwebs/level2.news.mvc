<?php

abstract class AbstractModel
{
    protected static $table;
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }


    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    // Набираем данные из форм
    public function fill($data = [])
    {

    }


    public function insert()
    {
        // Получаем список свойств модели:
        $cols = array_keys($this->data);
        $data = [];

        // Собираем все, чтобы было в вид ':title'
        foreach($cols as $col){
            $data[':' . $col] = $this->data[$col];
        }

        $sql = 'INSERT INTO ' . static::$table . '
        (' . implode(', ', $cols) . ')
        VALUES
        (' . implode(', ', array_keys($data)) . ')
        ';

        // У нас есть $this->data
        // Он выглядит ['title' => 'Foo', 'content' = > 'Bar']
        // Для подстановки надо ['title' => 'Foo', 'content' = > 'Bar']
        // Для этого делается массив $data

        $db = new DB();
        $db->execute($sql, $data);
        echo $db->lastId();
        die;
    }


    public static function update($id)
    {
        $class = get_called_class();
        $sql = 'UPDATE * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }


    public static function delete($id)
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        return $db->query($sql, [':id' => $id])[0];
    }




//4. Напишите метод ->update(), который будет обновлять данные в уже существующей записи.

//5. Создайте метод ->delete()














}



//    protected static $table;
//    protected static $class;
//
//    public static function getAll()
//    {
//        $db = new DB;
//        return $db->queryAll('SELECT * FROM ' . static::$table, static::$class);
//    }
//
//    public static function getOne($id)
//    {
//        $db = new DB;
//        return $db->queryOne('SELECT * FROM ' .static::$table. ' WHERE id = ' . $id, static::$class);
//    }
//
//    public function insertOne()
//    {
//        $sql = "INSERT INTO " .static::$table. " (title, text)
//            VALUES (
//             '" . $this->title . "',
//             '" . $this->content . "')";
//
//        $db = new DB;
//        return $db->insert($sql);
//    }