<?php

class Number
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function getCurrentNumber()
    {
        $resultArray = $this->getQueueInformation();
        $currentNumber = $resultArray['currentNumber'];
        return $currentNumber;
    }

    public function setCurrentNumber($currentNumber)
    {
        $result = $this->db->prepare("UPDATE queue SET currentNumber = :currentNumber");
        $result->bindParam(":currentNumber", $currentNumber, PDO::PARAM_INT);
        $result->execute();
    }

    public function setUserCurrentNumber($currentNumber, $userID)
    {
        $result = $this->db->prepare("UPDATE queue SET user" . $userID . "= :currentNumber");
        $result->bindParam(":currentNumber", $currentNumber, PDO::PARAM_INT);
        $result->execute();
    }

    public function resetUserCurrentNumber()
    {
        for ($i = 1; $i <= 4; $i++) {
            $this->setUserCurrentNumber(0, $i);
        }
    }

    public function getUserCurrentNumber($userID)
    {
        $resultArray = $this->getQueueInformation();
        $currentNumber = $resultArray['user' . $userID];
        return $currentNumber;
    }

    private function getQueueInformation()
    {
        $id = 1;

        $result = $this->db->prepare("SELECT * FROM queue WHERE id = :id");
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();

        $resultArray = $result->fetch(PDO::FETCH_ASSOC);
        return $resultArray;
    }

    public function updateUserInformation()
    {
        $_SESSION['user1'] = $this->getUserCurrentNumber(1);
        $_SESSION['user2'] = $this->getUserCurrentNumber(2);
        $_SESSION['user3'] = $this->getUserCurrentNumber(3);
        $_SESSION['user4'] = $this->getUserCurrentNumber(4);
    }
}