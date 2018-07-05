<?php


class SiteController
{
    public function actionIndex()
    {
        $model = new Number();
        $_SESSION['currentNumber'] = $model->getCurrentNumber();
        if (isset($_POST['next'])) {
            $model->setCurrentNumber($_SESSION['currentNumber'] + 1);
        }

        if (isset($_POST['reset'])) {
            $model->setCurrentNumber(0);
        }

        if (isset($_POST['prev'])) {
            $model->setCurrentNumber($_SESSION['currentNumber'] - 1);
        }
        require_once(__DIR__ . '/../public/views/site/index.php');
    }
}