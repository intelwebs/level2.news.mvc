<?php

class NewsController
{
    public function actionAll()
    {
        $items = News::findAll();

        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }



    public function actionOne()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $item = News::findOneByPk($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

}


