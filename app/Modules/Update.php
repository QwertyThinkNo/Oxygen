<?php

namespace App\Modules;

/*
 __      __  ______   ____
/\ \  __/\ \/\__  _\ /\  _ \
\ \ \/\ \ \ \/_/\ \/ \ \ \_\\
 \ \ \ \ \ \ \ \ \ \  \ \  __/
  \ \ \_/ \_\ \ \_\ \__\ \ \/
   \ `\_______/ /\_____\\ \_\
    \_/__//__/  \/_____/ \/_/
        Soooooooooonnnnn
*/


/**
 * Method for check and test about potential update
 */
class Update
{

    public static function IsConnected()
    {
        // Open connection to example.com
        $connected = @fsockopen( "www.example.com" );

        if ( $connected ){
            $is_conn = true ;
        }
        else
        {
            $is_conn = false ;
        }

        return $is_conn;
        fclose( $connected );
    }

    public static function CheckLatestVersion()
    {
        if ( self::IsConnected )
        {
            $latest = json_decode( "https://api.github.com/repos/QwertyThinkNo/Oxygen/releases/latest" );
            // TODO: Check latest version
        }
        else
        {
            return false ;
        }
    }

}
