<?php

namespace Models;

use PDO;

class ServiceModel
{
    protected static $table = "insumos";
    protected static $columnsTable = [
        "id",
        "clave",
        "descripcion"
    ];

    public $id;
    public string $clave;
    public string $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->clave = $args["clave"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
    }

    public static function read(string $insumoDescription): array
    {
        $query = "SELECT id, clave, descripcion FROM insumos WHERE descripcion LIKE '%$insumoDescription%' LIMIT 5";
        $result = self::consultSQL($query);
        echo json_encode($result);
        return $result;
    }

    public static function consultSQL($query): array
    {
        $connection = ConnectionDB::getInstance();
        $conn = $connection->getConnection();
        $result = $conn->query($query);

        $array = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $array[] = static::createObject($row);
        }

        return $array;
    }

    public static function createObject(array $row): object
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
