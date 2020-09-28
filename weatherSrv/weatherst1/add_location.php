<?php
    // Connect to MySQL
    include("dbConnector.php");
    
    $con=connectToDb();
    
    date_default_timezone_set('Europe/Athens');
   
    $SQL = "INSERT INTO weatherst.log (station_name, latitude, longitude) VALUES ('".$_GET["host"]."', '".$_GET["lat"]."', '".$_GET["lon"]."')";
    // Execute SQL statement
    $results = mysqli_query($con,$SQL);
    
    if(! $results) {
               die('Could not enter data: ' . mysqli_error());
               mysqli_close($con);
               exit();
            }
            
            echo "OK";
    
   mysqli_close($con);

?>
