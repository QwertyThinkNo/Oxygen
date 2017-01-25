<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * Parent class for Controllers
 */
class Controller
{

    private $container;

    function __construct( $container )
    {
        $this->container = $container;
    }

    public function render( Response $response, $file, $args = [] )
    {
        $this->container->view->render( $response, $file, $args );
    }

    public function redirect( $response, $name, $code = 200 )
    {
        return $response->withStatus( $code )->withHeader( 'Location', $this->container->router->pathFor( $name ) );
    }

    public function __get( $name )
    {
        return $this->container->get( $name );
    }
}
