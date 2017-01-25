<?php

namespace App\Controllers;


use App\Models\User;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


/**
 * Controller for Auths actions 
 *
 * @return Response
 */
class AuthController extends Controller
{

    public function SignIn( Request $request, Response $response )
    {
        // Render
        $this->render( $response, 'pages/login.twig' );
    }

    public function PostSignIn( Request $request, Response $response )
    {
        $username = $request->getParam( 'username' );
        $passw = $request->getParam( 'password' );

        $auth = $this->auth->attempt( $username, $passw );

        if ( !$auth ) 
        {
           return $this->redirect( $response, 'login', 403 ); 
        }
        else
        {
            return $this->redirect( $response, 'home');
        }
    }

    public function Logout( Request $request, Response $response )
    {
        $this->auth->logout();

        return $this->redirect( $response, 'index' ); 
    }

}