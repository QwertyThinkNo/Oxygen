<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


/**
 * Controller for POST action
 */

class PostsController extends Controller
{

    public function PostInterface( Request $request, Response $response )
    {
        //Get and decode Json
        $PassageJson = file_get_contents( dirname( __DIR__, 2 ) . '/data/actualPassage.json' );
        $PassageJson = json_decode( $PassageJson, true );

        //Update Json
        $PassageJson[ 'actual' ][ 'int' ] = $PassageJson[ 'actual' ][ 'int' ] + 1;

        //Update last update timestamp
        $PassageJson[ 'last update' ] = time();

        //Encode Json
        $PassageJson = json_encode( $PassageJson, JSON_PRETTY_PRINT );

        //Save Json
        file_put_contents( dirname( __DIR__, 2 ) . '/data/actualPassage.json', $PassageJson, LOCK_EX );

        //Redirect
        return $this->redirect( $response, 'interface' );
    }
}
