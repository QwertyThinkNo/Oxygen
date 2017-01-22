<?php

//INDEX
$app->GET( '/', \App\Controllers\PagesController::class . ':Index' );


//AUTH SYSTEM

//LOGIN => GET method
$app->GET( '/user/login', \App\Controllers\AuthController::class . ':Login' )->setName( 'login' );

//LOGIN => POST method
$app->POST( '/user/login', \App\Controllers\AuthController::class . ':PostLogin' );

//LOGOUT
$app->GET( '/user/logout', \App\Controllers\AuthController::class . ':Logout' )->setName( 'logout' );


//OXYGEN

//HOME
$app->GET( '/home', \App\Controllers\PagesController::class . ':Home' )->setName( 'home' );

//INTERFACE => GET method
$app->GET( '/interface', \App\Controllers\PagesController::class . ':Interface' )->setName( 'interface' );

//INTERFACE => POST method
$app->POST( '/interface', \App\Controllers\PostsController::class . ':PostInterface' );

//ABOUT
$app->GET( '/about', \App\Controllers\PagesController::class . ':About' )->setName( 'about' );
