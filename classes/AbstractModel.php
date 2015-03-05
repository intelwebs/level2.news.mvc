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


    public static function findByColumn($column, $value)
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . " LIKE '%".$value."%'";
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);

        // Проверка: print_r(News::findByColumn('title', 'сюжет'));
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

        $last_id = $db->lastId();
        return $last_id;
    }



// Обновляет, но есть какая-то ошибка: остсутствует один агргумент
    public function update()
    {
        $id = $this->id;
        $date = $this->date;
        $title = $this->title;
        $content = $this->content;

        $sql = "UPDATE " . static::$table . " SET date = '".$date."' , title = '".$title."' , content = '".$content."' WHERE id=:id";

        $db = new DB();
        $db->query($sql, [':id' => $id]);
        die;
    }




    public function delete($id)
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->query($sql, [':id' => $id]);
    }


}
