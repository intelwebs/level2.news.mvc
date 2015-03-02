<?php

class View implements Iterator
{
    private $position = 0;
    protected $data = [];

    public function __construct() {
        $this->position = 0;
    }


    // Для того, чтобы сработала в NewsController.php строка $view->items = $items;
    public function __set($k, $v){
        // В $this->data попадет массив array(1){ ["items"]=> array(5) { [0]=> object(News)#3 (4) { ["id"]=> "1" ["title"]=> "Заголовок новости"...
        $this->data[$k] = $v;
    }


    public function display($template){

        // хотим преобразовать $this->data['items'] в просто $items
        foreach($this->data as $key => $val){
            // нам бы хотелось создать такую переменную с таким же именем как $key
            // для этого используем $$
            // Таким образом мы получили $items = массив данных;
            $$key = $val;
        }

        include __DIR__.'/../views/'.$template;
    }




    /**
    ЧТОБЫ ПО ОБЪЕКТУ МОЖНО БЫЛО ПРОХОДИТЬ ИСПОЛЬЗУЕМ СТАНДАРТНЫЕ ФУНКЦИИ Iterator
     */

    // в начало
    public function rewind() {
        $this->position = 0;
    }

    // Настояще значение указателя
    public function current() {
        return $this->data[$this->position];
    }
    // ключ
    public function key() {
        return $this->position;
    }
    // следующее значение указателя
    public function next() {
        ++$this->position;
    }
    // верное значение
    public function valid() {
        return isset($this->data[$this->position]);
    }
}
