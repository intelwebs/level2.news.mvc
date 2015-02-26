<?php

class NewsController
{
    public function actionAll()
    {
        $items = News::getAll();
        return $items;
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        return $item;
    }
}
