<?php

use App\Middleware\AuthMiddleware;

//INDEX
$app->GET( '/', \App\Controllers\PagesController::class . ':Index' )->setName( 'index' );


//AUTH SYSTEM

//LOGIN => GET method
$app->GET( '/auth/login', \App\Controllers\AuthController::class . ':SignIn' )->setName( 'login' );

//LOGIN => POST method
$app->POST( '/auth/login', \App\Controllers\AuthController::class . ':PostSignIn' );

//LOGOUT
$app->GET( '/auth/logout', \App\Controllers\AuthController::class . ':Logout' )->setName( 'logout' );


//OXYGEN

$app->group('', function ()
{
    //ROUTE PROTEGED (need to be logged)

    //HOME
    $this->GET( '/home', \App\Controllers\PagesController::class . ':Home' )->setName( 'home' );

    //ADMIN BOARD
    $this->GET( '/adminboard', \App\Controllers\AdminsController::class . ':Admin')->setName( 'admin' );

    //ADMIN BOARD => POST method
    $this->POST( '/adminboard', \App\Controllers\AdminsController::class . ':PostAdmin');

    //INTERFACE => GET method
    $this->GET( '/interface', \App\Controllers\PagesController::class . ':Interface' )->setName( 'interface' );

    //INTERFACE => POST method
    $this->POST( '/interface', \App\Controllers\PostsController::class . ':PostInterface' );

    //ABOUT
    $this->GET( '/about', \App\Controllers\PagesController::class . ':About' )->setName( 'about' );

})->add( new AuthMiddleware( $container ) );
