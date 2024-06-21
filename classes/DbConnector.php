<?php

namespace classes;

use PDOException;
use PDO;

class DbConnector
{
    private $host = "localhost";
    private $dbname = "portfolio";
    private $dbuser = "root";
    private $dbpw = "";

    public function getConnection()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        try {
            $con = new PDO($dsn, $this->dbuser, $this->dbpw);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $exc) {
            die("ERROR: " . $exc->getMessage());
        }
    }

    public function executeQuery($query, $params = [])
    {
        try {
            $con = $this->getConnection();
            $stmt = $con->prepare($query);
            foreach ($params as $key => &$val) {
                $stmt->bindParam($key, $val);
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exc) {
            die("ERROR: " . $exc->getMessage());
        }
    }
}
?>
