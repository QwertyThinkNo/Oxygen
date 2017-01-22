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
}
