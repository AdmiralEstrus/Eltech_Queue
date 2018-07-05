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
        $result = $this->db->prepare("SELECT * FROM queue WHERE id = ?");
        return $result->execute(array('id' => 1));
    }

    public function setCurrentNumber($currentNumber)
    {
        $result = $this->db->prepare("UPDATE queue SET currentNumber = ?");
        $result->execute(array($currentNumber));
    }
}