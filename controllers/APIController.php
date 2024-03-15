<?php

namespace Controllers;

use Models\ConnectionDB;
use Models\ServiceModel;

class APIController
{
    public static function getInsumos()
    {
        $insumoDescripcion = $_POST["insumoDescripcion"];
        ServiceModel::read($insumoDescripcion);
    }
}
