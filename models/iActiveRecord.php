<?php

namespace Models;

interface iActiveRecord
{
    public static function getErrors(): array;

    public function validate(): array;

    public function save();

    public static function read(): array;

    public static function get($rows): array;

    public static function find($id): object;

    public function create();

    public function update();

    public function delete();

    public static function consultSQL(string $query): array;

    public static function createObject(array $row): object;

    public function attributes(): array;

    public function sincronize($args = []);
}
