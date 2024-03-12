<?php

function debug($var): string
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}

function sanitize($html): string
{
    $sanitize = htmlspecialchars($html);
    return $sanitize;
}

function showAlert(int $parameter)
{
    $alert = "";

    switch ($parameter) {
        case 1:
            $alert = "Creado Correctamente";
            break;
        case 2:
            $alert = "Actualizado Correctamente";
            break;
        case 3:
            $alert = "Eliminado Correctamente";
            break;
        default:
            $alert = false;
            break;
    }
    return $alert;
}

function validateOrRedirect(string $url): int
{
    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: $url");
    }
    return $id;
}
