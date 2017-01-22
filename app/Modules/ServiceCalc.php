<?php

namespace App\Controllers;

/**
 * Method for service functionality
 */
class ListFormatter
{

    public static function weekAorB()
    {
        // Get week number
        $WeekNumber = strftime( "%V" );

        // Check number with modulo
        if( $WeekNumber % 2 != 0 )
        {
            //Week A
            return 'A' ;
        }
        else
        {
            //Week B
            return 'B' ;
        }
    }

    public static function getPassageList( $day, $WeekAorB )
    {

        $ini = parse_ini_file( dirname( __DIR__, 2 ) . '/configs/passageList.ini', true );

        if (  @is_null( $ini['WEEK ' . $WeekAorB][$day] ) )
        {
            // Day not exist
            return false ;
        }
        else
        {
            //Get the list
            $FormList = $ini['WEEK ' . $WeekAorB][$day];

            // Separate item with ','
            $FormList = explode( ',', $FormList );

            //Remove white space
            $FormList = array_map( 'trim', $FormList );

            return $FormList ;
        }

    }

}
