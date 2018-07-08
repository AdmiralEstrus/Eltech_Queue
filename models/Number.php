<?php

class Number
{
    /**
     * Экземляр элемента базы данных
     * @var $db
     */
    private $db;


    /**
     * Number конструктор, устанавливает соединение с БД.
     */
    public function __construct()
    {
        $this->db = Db::getConnection();
    }


    /**
     * Получить информацию из базы данных
     * @param $tableName - имя таблицы
     * @param int $id - id строки в БД
     * @return mixed - массив с информацией
     */
    private function selectInformationFromDB($tableName, $id)
    {
        $result = $this->db->prepare("SELECT * FROM $tableName WHERE id = $id");
        $result->execute();
        $resultArray = $result->fetch(PDO::FETCH_ASSOC);
        return $resultArray;
    }


    /**
     * Вызывает метод и собирает информацию из базы данных
     * @param int $id - id строки в БД
     * @return mixed - массив с информацией
     */
    public function getQueueInformation($id = 1)
    {
        $queueInformation = $this->selectInformationFromDB("queue", $id);
        return $queueInformation;
    }


    /**
     * Обновить информацию в БД
     * @param $tableName - имя таблицы, в которой изменяется информация
     * @param $fieldName - имя изменяемого поля
     * @param $fieldValue - значение поля
     * @param $id - id строки в БД
     */
    private function updateInformationInDB($tableName, $fieldName, $fieldValue, $id)
    {
        $result = $this->db->prepare("UPDATE $tableName SET $fieldName = $fieldValue WHERE id = $id");
        $result->execute();
    }


    /**
     * Установить новое значение currentNumber в БД
     * @param $currentNumber - устанавливаемое значение. Если не задано, то берется из сессии
     * @param int $id - id строки в БД
     */
    public function setCurrentNumber($currentNumber, $id = 1)
    {
        $this->updateInformationInDB("queue", "currentNumber", $currentNumber, $id);
    }


    /**
     * Обновить текущий номер у пользователя в БД
     * @param $number - обновляемое значение
     * @param $userID - номер пользователя
     * @param int $id - id строки в БД
     */
    public function setUserNumber($number, $userID, $id = 1)
    {
        $this->updateInformationInDB("queue", "user" . $userID, $number, $id);
    }


    /**
     * Обновить информацию о всех элементах из БД и записать ее в сессию
     * @param int $id - id строки в БД
     */
    public function updateSiteInfo($id = 1)
    {
        $informationArray = $this->selectInformationFromDB("queue", $id);
        $_SESSION['user1'] = $informationArray['user1'];
        $_SESSION['user2'] = $informationArray['user2'];
        $_SESSION['user3'] = $informationArray['user3'];
        $_SESSION['user4'] = $informationArray['user4'];
    }

    /**
     * Добавляет нового пользователя
     * @param int $id - id строки в БД
     * @return bool - удалось ли добавить нового пользователя
     */
    public function setNewUser($id = 1)
    {
        $userID = $_POST['userID'];

        $queueInformation = $this->getQueueInformation();
        if ($queueInformation['user' . $userID . "ID"] == $userID) {
            $_SESSION['errorMessage'] = "Пользователь с таким ID уже авторизован!";
            return false;
        }

        $_SESSION['systemAdminID'] = $userID;
        $this->updateInformationInDB("queue", "user" . $userID . "ID", $userID, $id);
        return true;
    }

    /**
     * Выполняется выход из системы для пользователя
     * @param int $id - id строки в БД
     */
    public function removeUser($id = 1)
    {
        $userID = $_SESSION['systemAdminID'];
        $this->updateInformationInDB("queue", "user" . $userID . "ID", 0, $id);
        unset($_SESSION['currentNumber']);
        unset($_SESSION['systemAdminID']);
    }
}