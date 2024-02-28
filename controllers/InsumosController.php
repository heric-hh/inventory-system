<?php

namespace Controllers;

use Models\InsumosModel;
use MVC\Router;


class InsumosController
{

    public static function showInsumos(Router $router)
    {
        $insumos = InsumosModel::read();
        debug($insumos);
        $router->render("pages/insumos", [
            "insumos" => $insumos
        ]);
    }
}
