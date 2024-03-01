<?php

namespace Models;

use PDO;

class CategoriasModel
{

    protected static $table = "categorias";
    protected static $columnsTable = [
        "id",
        "categoria"
    ];

    //Attributes
    public int $id;
    public string $categoria;

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
        $query = "SELECT * FROM categorias";
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
