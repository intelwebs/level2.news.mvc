<?php

namespace App\Controllers;
use App\Models\News;

class Admin
{

    public function actionAdd()
    {
        $this->getView('news/add.php');

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

                header('Location: /');
                exit;
            }
        }
    }



    public function actionUpdate()
    {
        $id = $_GET['id'];

        $item = News::findOneByPk($id);
        $view = new \View();
        $view->item = $item;
        $view->display('news/update.php');

        if(isset($_POST['save']))
        {
            $article = new News;
            $article->id = $_POST['id'];
            $article->date = $_POST['date'];
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->update();

            header('Location: /');
            exit;
        }
    }



    public function actionDel()
    {
        if(isset($_GET['id']))
        {
            $article = new News;
            $article->id = $_GET['id'];
            $article->delete();

            header('Location: /');
            exit;
        }else{
            echo "Нет такого id";
        }
    }



    public function getView($path)
    {
        $view = new \View();
        $view->display($path);
    }

}
