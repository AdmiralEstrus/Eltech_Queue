<?php

require_once __DIR__ . "/../models/Number.php";

class SiteController
{
    /**
     * Экземляр модели обработчика
     * @var $model
     */
    private $model;


    /**
     * SiteController конструктор - создает экземляр модели Number.
     */
    public function __construct()
    {
        $this->model = new Number();
    }

    /**
     * Установить новое значение текущего номера в БД и обновить информацию в сессии
     * @param $number - новое значение текущего номера
     * @param int $dbID - id строки в БД
     */
    private function setCurrentNumberAndUpdate($number, $dbID = 1)
    {
        $this->model->setCurrentNumber($number, $dbID);
        $this->model->updateSiteInfo($dbID);
    }

    /**
     * Установить новое значение для пользователя
     * @param $userID - id пользователя, которому установить новое значение
     */
    private function setUserNextNumber($userID)
    {
        $_SESSION['currentNumber']++;
        $this->model->setUserNumber($_SESSION['currentNumber'], $userID);
        $this->setCurrentNumberAndUpdate($_SESSION['currentNumber']);
    }

    /**
     * Отображает страницу с панелью администратора
     */
    public function actionIndex()
    {
        $siteInformation = $this->model->getQueueInformation();
        $_SESSION['currentNumber'] = $siteInformation['currentNumber'];
        $this->model->updateSiteInfo();

        if (isset($_POST['next1'])) {
            $this->setUserNextNumber(1);
        }
        if (isset($_POST['next2'])) {
            $this->setUserNextNumber(2);
        }
        if (isset($_POST['next3'])) {
            $this->setUserNextNumber(3);
        }
        if (isset($_POST['next4'])) {
            $this->setUserNextNumber(4);
        }


        if (isset($_POST['reset'])) {
            $_SESSION['currentNumber'] = 0;
            for ($i = 1; $i <= 4; $i++)
                $this->model->setUserNumber(0, $i);
            $this->setCurrentNumberAndUpdate($_SESSION['currentNumber']);
        }

        if (isset($_POST['prev']) && $_SESSION['currentNumber'] > 0) {
            $zeroCount = 0;
            $notMatched = 0;
            for ($i = 1; $i <= 4; $i++) {
                if ($_SESSION['user' . $i] == 0)
                    $zeroCount++;
                if ($_SESSION['user' . $i] == $_SESSION['currentNumber']) {
                    $_SESSION['currentNumber']--;
                    $_SESSION['user' . $i] = 0;
                    $this->model->setUserNumber(0, $i);
                    $this->setCurrentNumberAndUpdate($_SESSION['currentNumber']);
                    break;
                } else
                    $notMatched++;
            }
            if ($zeroCount == 4 or $notMatched == 4) {
                $_SESSION['currentNumber']--;
                $this->setCurrentNumberAndUpdate($_SESSION['currentNumber']);
            }
        }
        require_once(__DIR__ . '/../public/views/site/index.php');
    }

    /**
     * Отображает страницу с информацией для абитуриентов
     */
    public function actionQueue()
    {
        $siteInformation = $this->model->getQueueInformation();
        $_SESSION['currentNumber'] = $siteInformation['currentNumber'];
        $this->model->updateSiteInfo();

        require_once(__DIR__ . '/../public/views/site/queue.php');
    }
}