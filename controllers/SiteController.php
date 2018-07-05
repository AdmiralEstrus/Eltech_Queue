<?php

require_once __DIR__ . "/../models/Number.php";

class SiteController
{
    private $model;

    public function __construct()
    {
        $this->model = new Number();
    }

    private function setNextNumber($userID)
    {
        $_SESSION['currentNumber']++;
        $_SESSION['user' . $userID] = $_SESSION['currentNumber'];

        $this->model->setUserCurrentNumber($_SESSION['currentNumber'], $userID);
        $this->updateCurrentNumberInDB();
    }

    private function updateCurrentNumberInDB()
    {
        $this->model->setCurrentNumber($_SESSION['currentNumber']);
    }

    public function actionIndex()
    {

        $_SESSION['currentNumber'] = $this->model->getCurrentNumber();
        $this->model->updateUserInformation();

        if (isset($_POST['next1'])) {
            $this->setNextNumber(1);
        }
        if (isset($_POST['next2'])) {
            $this->setNextNumber(2);
        }
        if (isset($_POST['next3'])) {
            $this->setNextNumber(3);
        }
        if (isset($_POST['next4'])) {
            $this->setNextNumber(4);
        }

        if (isset($_POST['reset'])) {
            $_SESSION['currentNumber'] = 0;
            $this->updateCurrentNumberInDB();
            $this->model->resetUserCurrentNumber();
            $this->model->updateUserInformation();
        }

        if (isset($_POST['prev'])) {
            $_SESSION['currentNumber']--;
            $this->updateCurrentNumberInDB();
        }
        require_once(__DIR__ . '/../public/views/site/index.php');
    }

    public function actionQueue()
    {
        $_SESSION['currentNumber'] = $this->model->getCurrentNumber();
        $this->model->updateUserInformation();

        require_once(__DIR__ . '/../public/views/site/queue.php');
    }

    public function actionTest()
    {
        $_SESSION['currentNumber'] = $this->model->getCurrentNumber();
        require_once(__DIR__ . '/../public/views/site/test.php');
    }

    public function actionTestshow()
    {
        $_SESSION['currentNumber'] = $this->model->getCurrentNumber();
        require_once(__DIR__ . '/../public/views/site/test_show.php');
    }


}