<?php

namespace Controllers;

use MVC\Router;

class PagesController
{

    public static function showLanding(Router $router)
    {
        $router->render("misc/home");
    }
}
