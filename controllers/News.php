<?php

namespace App\Controllers;
use App\Models\News as NewsModel;

class News
{
    public function actionAll()
    {
        $items = NewsModel::findAll();

        $view = new \View();
        $view->items = $items;
        $view->display('news/all.php');
    }



    public function actionOne()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $item = NewsModel::findOneByPk($id);
        $view = new \View();
        $view->item = $item;
        $view->display('news/one.php');
    }

}


