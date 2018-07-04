<?php

class DbConnection
{
    private $_dbConnection;

    public function __construct()
    {
        try {
            $config = include __DIR__ . '/../config/db.php';
            $dsn = "mysql:host=" . $config['host'] . ";port=" . $config['port'] . ";dbname=" . $config['dbname'];
            $this->_dbConnection = new PDO($dsn, $config['username'], $config['password']);
        } catch (PDOException $exception) {
            error_log("Ошибка соединения с базой данных: " . $exception->getMessage());
        }
    }

    public function __destruct()
    {
        $this->_dbConnection = null;
    }

    public function findOne($string)
    {
        $sth = $this->_dbConnection->prepare("SELECT * FROM queue WHERE id = '$string'");
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

//    public function newLine($currentNumber)
//    {
//        $sth = $this->_dbConnection->prepare("INSERT INTO queue(currentNumber) VALUES('$currentNumber')");
//        if (!$sth->execute())
//            return false;
//        return true;
//    }

    public function update($currentNumber)
    {
        $sth = $this->_dbConnection->prepare("UPDATE queue SET currentNumber = $currentNumber");
        if (!$sth->execute())
            return false;
        return true;
    }
}