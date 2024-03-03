<?php

namespace Controllers;

use Models\CategoriasModel;
use Models\InsumosModel;
use Models\PresentacionModel;
use MVC\Router;


class InsumosController
{

    public static function showInsumos(Router $router)
    {
        $insumos = InsumosModel::read();
        $router->render("pages/insumos", [
            "insumos" => $insumos,
        ]);
    }

    public static function create(Router $router)
    {
        $errors = InsumosModel::getErrors();
        $categorias = CategoriasModel::read();
        $presentaciones = PresentacionModel::read();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        }

        $router->render("pages/crearinsumo", [
            "errors" => $errors,
            "presentaciones" => $presentaciones,
            "categorias" => $categorias

        ]);
    }
}
