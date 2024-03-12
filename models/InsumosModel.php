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

    public static function find($id): object
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id = $id";
        $result = self::consultSQL($query);
        return array_shift($result);
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
            header("Location: /insumos?result=1");
        }
    }

    public function update()
    {
        $connection = ConnectionDB::getInstance();
        $conn = $connection->getConnection();

        $attributes = $this->attributes();
        $values = [];

        foreach ($attributes as $key => $value) {
            $values[] = "$key = '$value'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(", ", $values);
        $query .= " WHERE id = '" . $this->id . "' ";
        $stmt = $conn->prepare($query);
        $isQueryOk = $stmt->execute();

        if ($isQueryOk) {
            header("Location: /insumos?result=2");
        }
    }

    public function delete()
    {
        $connection = ConnectionDB::getInstance();
        $conn = $connection->getConnection();

        $query = "DELETE FROM " . static::$table . " WHERE id = " . $this->id;
        $stmt = $conn->prepare($query);
        $isQueryOk = $stmt->execute();

        if ($isQueryOk) {
            header("Location: /insumos?result=3");
        }
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
