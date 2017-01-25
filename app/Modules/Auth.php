<?php

namespace App\Modules;

use App\Models\User;

class Auth
{

    public function user()
    {
        if ( isset( $_SESSION[ 'user' ][ 'id' ] ) ) 
        {
            return User::find( $_SESSION[ 'user' ][ 'id' ] );
        }

        return false;
    }

    public function getUser()
    {
        return User::select( [ 'id', 'username', 'role' ] )->get()->toArray();
    }

    public function isConnected()
    {
        return isset( $_SESSION[ 'user' ][ 'id' ] );
    }

    public function isAdmin()
    {
        if ( isset( $_SESSION[ 'user' ][ 'id' ] ) ) 
        {
             return ( $_SESSION[ 'user' ][ 'role' ] == 'admin' ) ? true : false;
        }

        return false;
    }

    public function attempt( $username, $passw )
    {

        $user = User::where('username', $username )->first();

        if ( !$user )
        {
            return false;
        }

        if ( password_verify( $passw, $user->password ) )
        {
            $_SESSION['user'][ 'id' ] = $user->id;
            $_SESSION['user'][ 'role' ] = $user->role;
            return true;
        }
        else
        {
            return false;
        }
    }

    public function Logout()
    {
        unset( $_SESSION[ 'user' ] );
        session_destroy();
    }
}