<?php
    
class DB {

    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {
            $this->dbh = new PDO('mysql:host=localhost;dbname=first_project;charset=utf8', 'root', 'qwerty123');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
    }

    // Prepared query function
    public function preparedQuery($preparedQuery)
    {
        $this->stmt = $this->dbh->prepare($preparedQuery);
    }

    // Bind function
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->stmt->bindValue($param, $value, $type);
        }
    }

    // Execute function
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Getting the result in associative array
    public function fetchAllAssoc()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getting in array with key elements
    public function fetchAllNum()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_NUM);
    }

    // Fetches one row of the database
    public function fetchRowAssoc()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getDatabaseConnection()
    {
        return $this->dbh;
    }

}
