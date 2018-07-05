<?php

require_once __DIR__ . "/../models/Number.php";

class SiteController
{
    public function actionIndex()
    {
        $model = new Number();
        $_SESSION['currentNumber'] = $model->getCurrentNumber();
        $_SESSION['user1'] = $model->getUserCurrentNumber(1);
        $_SESSION['user2'] = $model->getUserCurrentNumber(2);
        $_SESSION['user3'] = $model->getUserCurrentNumber(3);
        $_SESSION['user4'] = $model->getUserCurrentNumber(4);
        if (isset($_POST['next1'])) {
            $_SESSION['currentNumber']++;
            $model->setUserCurrentNumber($_SESSION['currentNumber'], 1);
            $this->updateCurrentNumberInDB();
            $_SESSION['user1'] = $_SESSION['currentNumber'];
        }
        if (isset($_POST['next2'])) {
            $_SESSION['currentNumber']++;
            $model->setUserCurrentNumber($_SESSION['currentNumber'], 2);
            $this->updateCurrentNumberInDB();
            $_SESSION['user2'] = $_SESSION['currentNumber'];
        }
        if (isset($_POST['next3'])) {
            $_SESSION['currentNumber']++;
            $model->setUserCurrentNumber($_SESSION['currentNumber'], 3);
            $this->updateCurrentNumberInDB();
            $_SESSION['user3'] = $_SESSION['currentNumber'];
        }
        if (isset($_POST['next4'])) {
            $_SESSION['currentNumber']++;
            $model->setUserCurrentNumber($_SESSION['currentNumber'], 4);
            $this->updateCurrentNumberInDB();
            $_SESSION['user4'] = $_SESSION['currentNumber'];
        }

        if (isset($_POST['reset'])) {
            $_SESSION['currentNumber'] = 0;
            $this->updateCurrentNumberInDB();
        }

        if (isset($_POST['prev'])) {
            $_SESSION['currentNumber']--;
            $this->updateCurrentNumberInDB();
        }
        require_once(__DIR__ . '/../public/views/site/index.php');
    }

    public function actionQueue()
    {
        $model = new Number();
        $_SESSION['currentNumber'] = $model->getCurrentNumber();
        $_SESSION['user1'] = $model->getUserCurrentNumber(1);
        $_SESSION['user2'] = $model->getUserCurrentNumber(2);
        $_SESSION['user3'] = $model->getUserCurrentNumber(3);
        $_SESSION['user4'] = $model->getUserCurrentNumber(4);
        require_once(__DIR__ . '/../public/views/site/queue.php');
    }

    public function actionTest()
    {
        $model = new Number();
        $_SESSION['currentNumber'] = $model->getCurrentNumber();
        require_once(__DIR__ . '/../public/views/site/test.php');
    }

    public function actionTestshow()
    {
        $model = new Number();
        $_SESSION['currentNumber'] = $model->getCurrentNumber();
        require_once(__DIR__ . '/../public/views/site/test_show.php');
    }

    private function updateCurrentNumberInDB()
    {
        $model = new Number();
        $model->setCurrentNumber($_SESSION['currentNumber']);
    }
}