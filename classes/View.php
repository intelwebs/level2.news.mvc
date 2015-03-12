<?php

class View
{
    private $position = 0;
    protected $data = [];

    public function __construct()
    {
        $this->position = 0;
    }


    // Для того, чтобы сработала в News.php строка $view->items = $items;
    public function __set($k, $v)
    {
        // В $this->data попадет массив array(1){ ["items"]=> array(5) { [0]=> object(News)#3 (4) { ["id"]=> "1" ["title"]=> "Заголовок новости"...
        $this->data[$k] = $v;
    }


    public function display($template)
    {
        // хотим преобразовать $this->data['items'] в просто $items
        foreach ($this->data as $key => $val) {
            // нам бы хотелось создать такую переменную с таким же именем как $key
            // для этого используем $$
            // Таким образом мы получили $items = массив данных;
            $$key = $val;
        }

        $file = __DIR__ . '/../views/' . $template;

        if (file_exists($file)){
            include __DIR__ . '/../views/' . $template;
        }else{
            throw new E404Exception("Не найден файл /../views/ $template", 404);
        }

    }
}