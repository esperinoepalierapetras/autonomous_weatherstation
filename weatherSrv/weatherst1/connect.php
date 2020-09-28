<?php
$MyUsername = "weather";  // enter your username for mysql
$MyPassword = "weather";  // enter your password for mysql
$MyHostname = "weatherst1";      // this is usually "localhost" unless your database resides on a different server

$dbh = mysql_pconnect($MyHostname , $MyUsername, $MyPassword);
$selected = mysql_select_db("weatherst",$dbh); //Enter your database name here 
?>
