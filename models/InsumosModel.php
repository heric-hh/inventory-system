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

    /**
     * id -> must be int for most cases, null for checking errors
     * categoria & presentacion -> may be integer, but for validation purpose they must cast to a string for initialization ( "" )
     */

    public $id;
    public $clave;
    public $descripcion;
    public $id_categoria;
    public $id_presentacion;
    public $id_lote;
    public $cantidad_total;


    protected static array $errors = [];

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->clave = $args["clave"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
        $this->id_categoria = $args["id_categoria"] ?? "";
        $this->id_presentacion = $args["id_presentacion"] ?? "";
        $this->id_lote = $args["id_lote"] ?? "";
        $this->cantidad_total = $args["cantidad_total"] ?? "";
    }

    public static function getErrors(): array
    {
        return self::$errors;
    }

    public function validate(): array
    {
        if (!$this->clave) {
            self::$errors[] = "Debes añadir una clave";
        }

        if (!$this->descripcion) {
            self::$errors[] = "Debes añadir una descripción";
        }

        if (!$this->id_categoria) {
            self::$errors[] = "Debes añadir una categoría";
        }

        if (!$this->id_presentacion) {
            self::$errors[] = "Debes añadir una presentación";
        }

        if (!$this->id_lote) {
            self::$errors[] = "Debes añadir un lote";
        }

        if (!$this->cantidad_total) {
            self::$errors[] = "Debes añadir una cantidad";
        }

        return self::$errors;
    }

    public function save()
    {
        if (!is_null($this->id)) {
            $this->update();
        } else {
            $this->create();
        }
    }

    public static function read(): array
    {
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
        $attributes = $this->attributes();

        $connection = ConnectionDB::getInstance();
        $conn = $connection->getConnection();

        $query = "INSERT INTO " . static::$table . " ( ";
        $query .= implode(", ", array_keys($attributes));
        $query .= ") VALUES ( '";
        $query .= implode("','", array_values($attributes)) . "' )";
        $stmt = $conn->prepare($query);
        $isQueryOk = $stmt->execute();

        if ($isQueryOk) {
            header("Location: /insumos");
        }
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

    public function attributes(): array
    {
        $attributes = [];
        foreach (static::$columnsTable as $column) {
            if ($column === "id") continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
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
