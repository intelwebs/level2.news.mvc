<?php

class AdminController
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
                //$article->insert();

                // Выводим содержание только что добавленной новости
                $item = News::findOneByPk($article->insert());
                $view = new View();
                $view->item = $item;
                $view->display('news/one.php');

            }
        }
    }



    public function actionUpdate($id)
    {
        $id = $_GET['id'];

        $item = News::findOneByPk($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/update.php');

        if(isset($_POST['save']))
        {
            $article = new News;
            $article->date = $_POST['date'];
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->update($id);
            header('Location: /');
            exit;
        }
    }



    public function actionDel($id)
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $article = new News;
            $article->delete($id);

            header('Location: /');
            exit;
        }else{
            echo "Нет такого id";
        }
    }



    public function getView($path)
    {
        $view = new View();
        $view->display($path);
    }

}
