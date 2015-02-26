<?php

class View
{
    public function display($items){
        $dir = isset($_GET['dir']) ? $_GET['dir'] : 'news';
        $view = isset($_GET['view']) ? $_GET['view'] : 'all';
        include __DIR__.'/../views/'.$dir.'/'.$view.'.php';
    }
}