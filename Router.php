<?php

namespace MVC;

class Router {

    public $getRoutes = [];
    public $postRoutes = [];

    public function get( string $actualUrl , array $function ) {
        $this->getRoutes[ $actualUrl ] = $function;
    }

    public function post( string $actualUrl , array $function ) {
        $this->postRoutes[ $actualUrl ] = $function;
    }
    
    public function checkRoutes() {
        $actualUrl = $_SERVER["PATH_INFO"] ?? "/";
        $requestType = $_SERVER["REQUEST_METHOD"];

        if( $requestType == "GET" ) {
            $fn = $this->getRoutes[ $actualUrl ] ?? null;
        }
        else {
            $fn = $this->postRoutes[ $actualUrl ] ?? null;
        }

        if( $fn ) {
            call_user_func( $fn , $this );
        }
        else {
            echo "Pagina NO encontrada";
        }
    }


    public function render( string $view , array $data = [] ) {
        
        include __DIR__ . "/views/includes/head.html.php";
        $containsLayout = $this->containsLayoutView( $view );
        
        if( $containsLayout === true ) {
            include __DIR__ . "/views/includes/layout.html.php";
        }
        
        include __DIR__ . "/views/$view.html.php";
    }


    private function containsLayoutView( string $view ) : bool {
        
        $contains = strpos( $view , "pages" );
        return ( $contains !== false && $contains >= 0 );

    }

}