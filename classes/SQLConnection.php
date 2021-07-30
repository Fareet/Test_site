<?php



class DataBaseManager
{
    const SERVERNAME = "localhost";
    const DATABASE = "blog";
    const USERNAME = "root";
    const PASSWORD = "123123";

    private $dataBase;


    public function __construct()
    {
        $this->dataBase = new PDO('mysql:host=' . SELF::SERVERNAME . ';dbname=' . SELF::DATABASE, SELF::USERNAME, SELF::PASSWORD);
    }

    public function GetConnection()
    {
        return  $this->dataBase;
    }

    public function ExecuteRequest($sql, $params = [])
    {
        $result = $this->dataBase->prepare($sql);
        $result->execute($params);
        return $result->fetchAll();
    }

    public function getAll($table, $sql = '', $params = [])
    {
        return $this->ExecuteRequest("SELECT * FROM $table" . $sql, $params);
    }

    public function getRow($table, $sql = '', $params = [])
    {
        $result = $this->ExecuteRequest("SELECT * FROM $table " . $sql, $params);
        return $result[0];
    }
}
