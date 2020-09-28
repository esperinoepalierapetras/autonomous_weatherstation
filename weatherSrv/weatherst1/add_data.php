<?php
    // Connect to MySQL
include("dbConnector.php");

$con=connectToDb();
//echo $con.'connected successfully';
    // Prepare the SQL statement
     date_default_timezone_set('Europe/Athens');
   //$dateS = date('%Y-%m-%d %H:%M:%S');
  // $dateS = date("r");
    //echo $dateS;

    $SQL = "INSERT INTO weatherst.data_1 (station_id,temperature,humidity,pressure,creation_time) VALUES ('".$_GET["host"]."','".$_GET["temp"]."','".$_GET["hum"]."','".$_GET["press"]."','".$_GET["dateS"]."')";     

    // Execute SQL statement
    $results = mysqli_query($con,$SQL);
    
    if(! $results ) {
               die('Could not enter data: ' . mysqli_error());
            }
            
            echo "Entered data successfully\n";
    
   //Free ram to be used for saving the results
    //mysqli_free_result($results);
    // Go to the review_data.php (optional)
    //header("Location: review_data.php");
	echo "<a href=\"review_data1.php\">Δείτε τα αποτελέσματα</a>";
mysqli_close($con);
?>
