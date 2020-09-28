<?php

function connectToDb()
{
        $dbConn = new mysqli( "localhost", "weather", "weather", "weatherst" );       
	if( $dbConn->connect_error )
        {
                die( 'Could not connect to database server. ' . $bdConn->connect_error );
        }

        $dbConn->query( "SET NAMES utf8" );
        return $dbConn;
}
#echo "DataBase Connected  Successfully";
#echo "database" . $dbConn . ;
?>

