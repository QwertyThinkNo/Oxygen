<?php

namespace App\Middleware;

/**
 * Parent class for Middlewares
 */
class Middleware
{

    protected $container;

    public function __construct( $container )
    {
        $this->container = $container;
    }

    public function redirect( $response, $name, $code = 200 )
    {
        return $response->withStatus( $code )->withHeader( 'Location', $this->container->router->pathFor( $name ) );
    }
}
