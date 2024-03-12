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
        $insumos = self::checkCategoria($insumos);
        $result = $_GET["result"] ?? null;
        $router->render("pages/insumos/insumos", [
            "insumos" => $insumos,
            "result" => $result,
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

        $router->render("pages/insumos/crearinsumo", [
            "errors" => $errors,
            "presentaciones" => $presentaciones,
            "categorias" => $categorias,
            "insumo" => $insumo

        ]);
    }

    public static function update(Router $router)
    {
        $id = validateOrRedirect("/insumos");
        $insumo = InsumosModel::find($id);
        $errors = InsumosModel::getErrors();

        $categorias = CategoriasModel::read();
        $presentaciones = PresentacionModel::read();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $args = $_POST["insumo"];
            $insumo->sincronize($args);
            $errors = $insumo->validate();

            if (empty($errors)) {
                $insumo->save();
            }
        }

        $router->render("pages/insumos/editarinsumo", [
            "insumo" => $insumo,
            "categorias" => $categorias,
            "presentaciones" => $presentaciones,
            "errors" => $errors,
        ]);
    }

    private static function checkCategoria(array $insumos)
    {
        foreach ($insumos as $insumo) {
            if ($insumo->id_categoria === 1) {
                $insumo->id_categoria = "Cuadro Básico";
            }
            if ($insumo->id_categoria === 2) {
                $insumo->id_categoria = "Anestésicos";
            }
            if ($insumo->id_categoria === 3) {
                $insumo->id_categoria = "Material de Curación";
            }
        }

        return $insumos;
    }
}
