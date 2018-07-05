<?php

require_once __DIR__ . "/../models/Number.php";

class SiteController
{
    public function actionIndex()
    {
        $model = new Number();
        $_SESSION['currentNumber'] = $model->getCurrentNumber();
        if (isset($_POST['next'])) {
            $_SESSION['currentNumber']++;
            $model->setCurrentNumber($_SESSION['currentNumber']);
        }

        if (isset($_POST['reset'])) {
            $_SESSION['currentNumber'] = 0;
            $model->setCurrentNumber($_SESSION['currentNumber']);
        }

        if (isset($_POST['prev'])) {
            $_SESSION['currentNumber']--;
            $model->setCurrentNumber($_SESSION['currentNumber']);
        }
        require_once(__DIR__ . '/../public/views/site/index.php');
    }

    public function actionQueue()
    {
        $model = new Number();
        $_SESSION['currentNumber'] = $model->getCurrentNumber();
        require_once(__DIR__ . '/../public/views/site/queue.php');
    }
}