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
        $id = 1;

        $result = $this->db->prepare("SELECT * FROM queue WHERE id = :id");
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();

        $resultArray = $result->fetch(PDO::FETCH_ASSOC);
        $currentNumber = $resultArray['currentNumber'];
        return $currentNumber;
    }

    public function setCurrentNumber($currentNumber)
    {
        $result = $this->db->prepare("UPDATE queue SET currentNumber = :currentNumber");
        $result->bindParam(":currentNumber", $currentNumber, PDO::PARAM_INT);
        $result->execute();
    }
}