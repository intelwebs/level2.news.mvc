<?php

class AdminController
{
    public function actionAdd()
    {
        if(isset($_POST['save'])) {
            $err = false;
            if (empty($_POST['title'])) {
                echo '<p>Не указан заголовок</p>';
                $err = true;
            }
            if (empty($_POST['content'])) {
                echo '<p>Нет содержания!</p>';
                $err = true;
            }

            if ($err == false) {
                $data = [];

                foreach ($_POST as $key => $item) {
                    if ($key != 'save') {
                        $data[$key] = $item;
                    }
                }

                News::insertOne($data);
                header("Location: /");
                die;
            }

        }else{
            $view = new View();
            $view->display('news/add.php');
        }
    }
}
