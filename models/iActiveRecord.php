<?php

namespace Models;

interface iActiveRecord
{
    public static function getErrors(): array;

    public function validate(): array;

    public function save();

    public static function read(): array;

    public static function get($rows): array;

    public static function find($id): array;

    public function create();

    public function update();

    public function delete();

    public static function consultSQL($query): array;

    public static function createObject($row): object;

    public function attributes(): array;

    public function sanitizeAttributes(): array;

    public function sincronize($args = []);
}
