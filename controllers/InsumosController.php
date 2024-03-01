<?php

namespace Controllers;

use Models\InsumosModel;
use MVC\Router;


class InsumosController
{

    public static function showInsumos(Router $router)
    {
        $insumos = InsumosModel::read();
        $router->render("pages/insumos", [
            "insumos" => $insumos
        ]);
    }

    public static function create(Router $router)
    {
        $errors = InsumosModel::getErrors();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        }

        $router->render("pages/crearinsumo", [
            "errors" => $errors,
        ]);
    }
}
