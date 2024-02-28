<?php 

function debug( $var ) : string {
    echo "<pre>";
    var_dump( $var );
    echo "</pre>";
    exit;
}

function sanitize( $html ) : string {
    $sanitize = htmlspecialchars( $html );
    return $sanitize;
}