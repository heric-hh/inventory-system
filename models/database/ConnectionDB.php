<?php

class ConexionDB
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $host = "localhost";
        $dbname = "inventory";
        $username = "postgres";
        $password = "3742";

        try {
            $dsn = "pgsql:host=$host;dbname=$dbname";
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
