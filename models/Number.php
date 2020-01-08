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
        $_SESSION['user5'] = $informationArray['user5'];
        $_SESSION['enableRoom'] = $informationArray['enableRoom'];
        $_SESSION['nextNumber'] = $informationArray['takenNumber'];
    }

    /**
     * Добавляет нового пользователя
     */
    public function setNewUser()
    {
        $_SESSION['systemAdminID'] = $_POST['userID'];
    }

    /**
     * Выполняется выход из системы для пользователя
     */
    public function removeUser()
    {
        unset($_SESSION['currentNumber']);
        unset($_SESSION['systemAdminID']);
    }

    public function switchFifthPC($id = 1)
    {
        $enableRoom = $_SESSION['enableRoom'];
        if ($enableRoom == 1)
            $enableRoom = 0;
        else
            $enableRoom = 1;
        $this->updateInformationInDB("queue", "enableRoom", $enableRoom, $id);
        $_SESSION['enableRoom'] = $enableRoom;
    }

    /**
     * Выдать следующий номер посетителю
     * @param int $id
     * @return int
     */
    public function reserveNextNumber($id = 1) {
        $queueInformation = $this->getQueueInformation($id);
        $nextNumber = (int) ($queueInformation['takenNumber']) + 1;
        $this->updateInformationInDB("queue", "takenNumber", $nextNumber, $id);
        return $nextNumber;
    }

    /**
     * Сбросить счетчик следующего номера
     * @param int $id
     */
    public function resetNextNumber($id = 1) {
        $this->updateInformationInDB("queue", "takenNumber", 0, $id);
    }
}
