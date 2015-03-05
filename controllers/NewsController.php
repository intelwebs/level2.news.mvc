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


    public function actionAdd()
    {
        $this->getView();

        if(isset($_POST['save'])) {
            $err = false;
            if (empty($_POST['title'])) {
                $err = true;
            }
            if (empty($_POST['content'])) {
                $err = true;
            }

            if ($err == false) {
                $article = new News;
                $article->title = $_POST['title'];
                $article->content = $_POST['content'];
                $article->insert();

                header("Location: /");
                die;
            }
        }
    }


    public function actionDel($id)
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $article = new News;
            $article->delete($id);

            header("Location: /");
            echo "Я ТУТ!";
            die;
        }else{
            echo "Нет такого id";
        }
    }




    public function getView()
    {
        $view = new View();
        $view->display('news/add.php');
    }
}


