<?php

namespace App\Controllers;


use App\Models\User;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


/**
 * Controller for Admin action
 *
 * @return Response
 */
class AdminsController extends Controller
{

    public function Admin( Request $request, Response $response )
    {
        //Render
        $this->render( $response, 'pages/admin.twig' );
    }

    public function PostAdmin( Request $request, Response $response )
    {
        // TO DO
        var_dump($request->getParsedBody());
    }
}
 
