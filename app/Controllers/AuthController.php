<?php

namespace App\Controllers;


use App\Models\User;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


/**
 * Controller for Auths actions 
 */
class AuthController extends Controller
{

    public function Login( Request $request, Response $response )
    {
        // Render
        $this->render( $response, 'pages/login.twig' );
    }

    public function PostLogin( Request $request, Response $response )
    {
        // TODO: user login

        $username = $request->getParsedBody()[ 'username' ];
        $passw = $request->getParsedBody()[ 'password' ];

        return $this->redirect( $response, 'login' );
    }

    public function Logout( Request $request, Response $response )
    {
        // TODO: user logout
    }

}