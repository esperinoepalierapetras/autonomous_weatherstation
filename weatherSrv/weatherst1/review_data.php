<?php 
    // Start MySQL Connection
    include("dbConnector.php");
    $con=connectToDb(); 


?>

<html>
<head>
    <title>Raspberry Pi Weather Station Logs</title>
    <style type="text/css">
        .table_titles, .table_cells_odd, .table_cells_even {
                padding-right: 20px;
                padding-left: 20px;
                color: #000;
        }
        .table_titles {
            color: #FFF;
            background-color: #666;
        }
        .table_cells_odd {
            background-color: #CCC;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
        }
        body { font-family: "Trebuchet MS", Arial; }
    </style>
</head>

    <body>
        <h1>Raspberry Pi Weather Station Log</h1>


    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td class="table_titles">ID</td>
	    <td class="table_titles">Station_ID</td>
            <td class="table_titles">Temperature</td>
            <td class="table_titles">Humidity</td>
            <td class="table_titles">Pressure</td>	    
	    <td class="table_titles">Rain</td>
	    <td class="table_titles">Date and Time</td>
          </tr>
<?php


    // Retrieve all records and display them
    $result = mysqli_query($con, "SELECT * FROM measurement ORDER BY id DESC limit 20");

    // Used for row color toggle
    $oddrow = true;

    // process every record
    while( $row = mysqli_fetch_array($result) )
    {
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr>';
        echo '   <td'.$css_class.'>'.$row["Id"].'</td>';
        echo '   <td'.$css_class.'>'.$row["station_id"].'</td>';
        echo '   <td'.$css_class.'>'.$row["temperature"].'</td>';
        echo '   <td'.$css_class.'>'.$row["humidity"].'</td>';
        echo '   <td'.$css_class.'>'.$row["pressure"].'</td>';
	echo '   <td'.$css_class.'>'.$row["rain"].'</td>';
	echo '	 <td'.$css_class.'>'.$row["creation_time"].'</td>';
        echo '</tr>';
    }
?>
    </table>
    </body>
</html>
