<?php

class View implements Iterator
{
    private $position = 0;
    protected $data = [];

    public function __construct() {
        $this->position = 0;
    }

    // С помощью метода assign передаем данные, которые мы хотим отобразить
    // Эти данные будут записаны во внутренний массив
    public function assign($name, $value){
        $this->data[$name] = $value;
    }

    // Для того, чтобы сработала в NewsController.php строка $view->items = $items;
    public function __set($k, $v){
        $this->data[$k] = $v;
    }


    public function display($template){

        // хотим преобразовать $this->data['items'] в просто $items
        foreach($this->data as $key => $val){
            // нам бы хотелось создать такую переменную с таким же именем как $key
            // для этого используем $$
            $$key = $val;

        }

        include __DIR__.'/../views/'.$template;
    }




    /**
    ЧТОБЫ ПО ОБЪЕКТУ МОЖНО БЫЛО ПРОХОДИТЬ ИСПОЛЬЗУЕМ СТАНДАРТНЫЕ ФУНКЦИИ Iterator
     */
    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->data[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->data[$this->position]);
    }
}



