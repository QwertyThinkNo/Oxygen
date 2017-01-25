<?php

namespace App\Middleware;


class AuthMiddleware extends Middleware
{

    public function __invoke( $request, $response, $next )
    {
        if ( !$this->container->auth->isConnected() ) {
            return $this->redirect( $response, 'login', 403 );
        }

        $response = $next( $request, $response );

        return $response;
    }
}
