<?php

namespace Models;

use PDO;

class PresentacionModel
{

    protected static $table = "presentaciones";
    protected static $columnsTable = [
        "id",
        "presentacion"
    ];

    //Attributes
    public int $id;
    public string $presentacion;

    protected static array $errors = [];

    public function __construct($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public static function getErrors(): array
    {
        return self::$errors;
    }

    public static function read(): array
    {
        $query = "SELECT * FROM presentacion";
        $result = self::consultSQL($query);
        return $result;
    }

    public static function consultSQL($query): array
    {
        $connection = ConnectionDB::getInstance();
        $conn = $connection->getConnection();
        $result = $conn->query($query);

        $rowsArray = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $rowsArray[] = static::createObject($row);
        }

        return $rowsArray;
    }

    public static function createObject($row): object
    {
        $obj = new static;

        foreach ($row as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }
        return $obj;
    }
}
