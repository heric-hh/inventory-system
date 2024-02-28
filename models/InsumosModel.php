<?php

namespace Models;

use Models\ConnectionDB;
use PDO;

class InsumosModel implements iActiveRecord
{

    protected static $table = "insumos";
    protected static $columnsTable = [
        "id",
        "clave",
        "descripcion",
        "id_categoria",
        "id_presentacion",
        "id_lote",
        "cantidad_total"
    ];

    // Attributes

    public int $id;
    public string $clave;
    public string $descripcion;
    public int $id_categoria;
    public int $id_presentacion;
    public int $id_lote;
    public int $cantidad_total;


    protected static array $errors;

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

    public function validate(): array
    {
        echo "Validando";
        return $array = [];
    }

    public function save()
    {
        echo "Guardando";
    }

    public static function read(): array
    {
        //! Reescribir método para que muestre los datos con inner join
        $query = "SELECT * FROM insumos";
        $result = self::consultSQL($query);
        return $result;
    }

    public static function get($rows): array
    {
        echo "get";
        return $array = [];
    }

    public static function find($id): array
    {
        echo "find";
        return $array = [];
    }

    public function create()
    {
        echo "create";
    }

    public function update()
    {
        echo "update";
    }

    public function delete()
    {
        echo "delete";
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

    public function attributes(): array
    {
        $attributes = [];
        foreach (static::$columnsTable as $column) {
            if ($column === "id") continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitizeAttributes(): array
    {
        $attributes = $this->attributes();
        $rowsSanitized = [];

        $connection = ConnectionDB::getInstance();
        $conn = $connection->getConnection();

        foreach ($attributes as $key => $value) {
            //TODO: Verificar la implementacion de este método "escape_string" marca error.
            // $rowsSanitized[$key] = $conn->escape_string($value);
        }
        return $rowsSanitized;
    }

    public function sincronize($args = [])
    {
        foreach ($args as $key => $value) {
            if ($key === "id") continue;
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
