<?php

require_once __DIR__ . "/includes/app.php";

use Controllers\DotacionesController;
use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\InsumosController;
use Controllers\EntradaSalidaController;
use MVC\Router;

$router = new Router();

$router->get("/", [PagesController::class, "showLanding"]);
$router->get("/login", [LoginController::class, "login"]);
$router->get("/insumos", [InsumosController::class, "showInsumos"]);
$router->get("/dotaciones", [DotacionesController::class, "showDotaciones"]);

$router->checkRoutes();
