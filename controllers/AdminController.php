<?php

class AdminController
{
    public function actionAdd()
    {
        if (isset($_REQUEST['save'])) {
            $err = false;
            if (empty($_REQUEST['title'])) {
                echo 'Не указан заголовок';
                $err = true;
            }
            if (empty($_REQUEST['content'])) {
                echo 'Нет содержания!';
                $err = true;
            }
            if ($err == false) {
                News::insertOne($_REQUEST);
                header("Location: /");
                die;
            }
        }
    }

}
