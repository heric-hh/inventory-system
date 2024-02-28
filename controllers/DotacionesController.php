<?php

namespace Controllers;

use MVC\Router;

class DotacionesController
{

    public static function showDotaciones(Router $router)
    {
        $router->render("pages/dotaciones");
    }
}
