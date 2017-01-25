<?php

namespace App\Controllers;

use \App\Modules\ListFormatter;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

setlocale ( LC_TIME, 'fr_FR.utf8', 'fr_FR', 'fra' );

/**
 * Controller for GET action
 *
 * @return Response
 */
class PagesController extends Controller
{

    //INDEX
    public function Index( Request $request, Response $response )
    {
        // Format passage list
        $FormList = ListFormatter::getPassageList( ucfirst( strftime( "%A" ) ), ListFormatter::weekAorB() ); 
        // Render
        $this->render( $response, 'pages/index.twig',
            ['today' => [
                'day' => strftime( "%A" ),
                'number' => strftime( "%e" ),
                'month' => utf8_encode(strftime( "%B" )),
                'year' => strftime( "%Y" ),

                'AorB' => ListFormatter::weekAorB(),

                'passage_list' => $FormList,

                ]
            ]
        );
    }

    // HOME
    public function Home( Request $request, Response $response )
    {
        // Render
        $this->render( $response, 'pages/home.twig');
    }

    // Components

    // INTERFACE
    public function Interface( Request $request, Response $response )
    {
        // Format passage list
        $FormList = ListFormatter::getPassageList( ucfirst( strftime( "%A" ) ), ListFormatter::weekAorB() );

        // Get and decode passage Json
        $PassageJson = file_get_contents( dirname( __DIR__, 2 ) . '/data/actualPassage.json' );
        $PassageJson = json_decode( $PassageJson, true );

        // Render
        $this->render( $response, 'pages/interface.twig',
            // Passage int
            ['passage' => [
                 'int' => $PassageJson['actual']['int']
                 ],
            // Time and day variables
             'today' => [
                 'day' => strftime( "%A" ),
                 'number' => strftime( "%e" ),
                 'month' => utf8_encode(strftime( "%B" )),
                 'year' => strftime( "%Y" ),

                 'AorB' => ListFormatter::weekAorB(),

                 'passage_list' => $FormList,
            ]
        ]);


    }

    //ABOUT
    public function About( Request $request, Response $response )
    {
        //PHP version verify
        $phpv = ( version_compare( PHP_VERSION, '7.0.0' ) >= 0 ) ? true : false;

        // Get and decode passage Json
        $appInfoJson = file_get_contents( dirname( __DIR__, 2 ) . '/data/appInfo.json' );
        $appInfoJson = json_decode( $appInfoJson, true );

        //Render
        $this->render( $response, 'pages/about.twig',
        ['info' => [
            //PHP infos
            'PHP' => [
                'version' => PHP_VERSION,
                'require' => $phpv,
            ],
            //Oxygen infos
            'Oxygen' => [
                'version' => $appInfoJson[ 'Oxygen' ][ 'release' ][ 'version' ],
                'release_type' => $appInfoJson[ 'Oxygen' ][ 'release' ][ 'type' ],
                'release_name' => $appInfoJson[ 'Oxygen' ][ 'release' ][ 'name' ],
                'release_date' => strftime( "%d %B %Y", intval( $appInfoJson[ 'Oxygen' ][ 'release' ][ 'date' ] ) ),
            ],
            //Environnement vars
            'env' => [
                'OS' => php_uname( 's' ),
                'version' => php_uname( 'v' ),
                'host' => php_uname( 'n' ),
                'arch' => php_uname( 'm' ),
            ]
        ]
    ]
);
}

}
