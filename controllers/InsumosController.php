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
        $insumo = new InsumosModel();
        $categorias = CategoriasModel::read();
        $presentaciones = PresentacionModel::read();

        $errors = InsumosModel::getErrors();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $insumo = new InsumosModel($_POST["insumo"]);
            $errors = $insumo->validate();

            if (empty($errors)) {
                $insumo->save();
            }
        }

        $router->render("pages/crearinsumo", [
            "errors" => $errors,
            "presentaciones" => $presentaciones,
            "categorias" => $categorias

        ]);
    }
}
