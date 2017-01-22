<?php

namespace App\Controllers;

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
 * Methods for get personal user conf
 */
class UserConf
{
    
    public function getUserSettings( $settingSearch = false )
    {
        if ( $settingSearch )
        {
            //Get settings and return parsed var
            $settingsFile = file_get_contents( dirname( __DIR__, 2 ) . '/configs/settings.ini' );
            $settingsArray = parse_ini_file( $settingsFile );

            if ( array_key_exists ( $settingSearch, $settingsArray ) ) 
            {
                return $settingsArray[ $settingSearch ];
            }
            else 
            {
                return false;
            }
        }
        else
        {
            //Get settings and return parsed var
            $settingsFile = file_get_contents( dirname( __DIR__, 2 ) . '/configs/settings.ini' );
            return parse_ini_file( $settingsFile );
        }
    }

}
