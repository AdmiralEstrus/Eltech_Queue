<?php

require_once __DIR__ . "/../models/Number.php";

class SiteController
{
    /**
     * Экземляр модели обработчика
     * @var $model
     */
    private $model;
    private $adminCount = 5;


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
     */
    private function setNextNumber()
    {
        $_SESSION['currentNumber']++;
        $userID = $_SESSION['systemAdminID'];
        $this->model->setUserNumber($_SESSION['currentNumber'], $userID);
        $this->setCurrentNumberAndUpdate($_SESSION['currentNumber']);
    }

    /**
     * Отображает страницу с панелью администратора
     */
    public function actionIndex()
    {
        if (!isset($_SESSION['systemAdminID'])) {
            header("Location: /authorization");
            exit();
        }

        $siteInformation = $this->model->getQueueInformation();
        $_SESSION['currentNumber'] = $siteInformation['currentNumber'];
        $this->model->updateSiteInfo();

        if (isset($_POST['next'])) {
            $this->setNextNumber();
        }

        if (isset($_POST['reset'])) {
            $_SESSION['currentNumber'] = 0;
            for ($i = 1; $i <= $this->adminCount; $i++)
                $this->model->setUserNumber(0, $i);
            $this->setCurrentNumberAndUpdate($_SESSION['currentNumber']);
        }

        if (isset($_POST['logout'])) {
            $this->model->removeUser();
            header("Location: /authorization");
            exit();
        }

        if (isset($_POST['add'])) {
            $this->model->switchFifthPC();
        }

        if (isset($_POST['prev']) && $_SESSION['currentNumber'] > 0) {
            $zeroCount = 0;
            $notMatched = 0;
            for ($i = 1; $i <= $this->adminCount; $i++) {
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
            if ($zeroCount == $this->adminCount or $notMatched == $this->adminCount) {
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

        if ($_SESSION['enableRoom'] == 1)
            require_once(__DIR__ . '/../public/views/site/queue_enable.php');
        else
            require_once(__DIR__ . '/../public/views/site/queue_disable.php');
    }

    /**
     * Отображает страницу авторизации
     */
    public function actionAuthorization()
    {
        if (isset($_SESSION['systemAdminID'])) {
            header("Location: /");
            exit();
        }

        if (isset($_POST['userID'])) {
            $this->model->setNewUser();
            header("Location: /");
            exit();
        }

        require_once(__DIR__ . '/../public/views/site/authorization.php');
    }
}