<?php 

namespace Controllers;

use MVC\Router;

class InsumosController {

    public static function showInsumos( Router $router ) {
        $router->render( "pages/insumos" );
    }
}