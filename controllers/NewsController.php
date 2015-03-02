<?php

class NewsController
{
    public function actionAll()
    {
        $items = News::getAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }


    public function actionAdd()
    {
        if(isset($_POST['save'])) {
            $err = false;
            if (empty($_POST['title'])) {
                $err = true;
            }
            if (empty($_POST['content'])) {
                $err = true;
            }

            if ($err == false) {
                $data['title'] = $_POST['title'];
                $data['content'] = $_POST['content'];

                $article = new News;
                $article->insertOne($data);

                header("Location: /");
                die;
            }

        }else{
            $view = new View();
            $view->display('news/add.php');
        }
    }
}
