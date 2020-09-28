<?php
    // Connect to MySQL
    include("dbConnector.php");
    
    $con=connectToDb();
    
    date_default_timezone_set('Europe/Athens');
   
    $SQL = "INSERT INTO weatherst.measurement (station_id,temperature,humidity,pressure,creation_time,rain) VALUES ('".$_GET["host"]."','".$_GET["temp"]."','".$_GET["hum"]."','".$_GET["press"]."','".$_GET["dateS"]."', '".$_GET["rain"]."')" ;
    
    // Execute SQL statement
    $results1 = mysqli_query($con,$SQL);
   
    
    //$mysqli->multi_query($mysqli); // OK

    //while ($mysqli->next_result()) // flush multi_queries
    //{
      //  if (!$mysqli->more_results()) break;
    //}

    //$mysqli->query("INSERT INTO weatherst.data_1 (station_id,temperature,humidity,pressure,creation_time) VALUES ('".$_GET["host"]."','".$_GET["temp"]."','".$_GET["hum"]."','".$_GET["press"]."','".$_GET["dateS"]."'); "); // now executed!
    //$mysqli->query("INSERT INTO weatherst.raindrops (rain, creation_time, station_id) VALUES ('".$_GET["rain"]."', '".$_GET["dateS"]."', '".$_GET["host"]."'); "); // now executed!
    //$mysqli->query(" SQL statement #3 ; ") // now executed!
    //$mysqli->query(" SQL statement #4 ; ") // now executed!
    
         
    if(! ($results1 && $results2)) {
               die('Could not enter data: ' . mysqli_error());
            }
            
            echo "Entered data successfully\n";
    
   //Free ram to be used for saving the results
    //mysqli_free_result($results);
    // Go to the review_data.php (optional)
    //header("Location: review_data.php");
	echo "<a href=review_data.php>Δείτε τα αποτελέσματα</a>";
mysqli_close($con);
?>
