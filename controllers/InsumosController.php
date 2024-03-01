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
}
