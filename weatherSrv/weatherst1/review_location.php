<?php

// Start MySQL Connection
include("dbConnector.php");
$con=connectToDb(); 

	
echo "<html><head>    <title>Εσπερινό ΕΠΑΛ Ιεράπετρας - Weather Station Raspberry Pi</title><link rel=\"stylesheet\" href=\"../css/bootstrap.min.css\" />".
"</head><body><div class=\"container\">
     <a class=\"navbar-brand\" href=\"../weatherst1/index.php\"><img src=\"../imgs/logo_mnae.jpg\" alt=\"MIA NEA ARXH STA EPAL\">
     </a><h1 class=\"text-center\">Εσπερινό ΕΠΑΛ Ιεράπετρας - Μια Νέα Αρχή στα ΕΠΑΛ </h1>
		<h1 class=\"text-center\">Raspberry Pi Weather Station  - Project 2018-2019</h1>
     <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar3\">
          <span class=\"sr-only\">Toggle navigation</span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
        </button>
       </div>
       <div id=\"navbar3\" class=\"navbar-collapse collapse\">
        <ul class=\"nav navbar-nav navbar-right\">
          <li class=\"active\"><a href=\"../weatherst1/index.php\">Home - Αρχική</a></li>
          <li class=\"active\"><a href=\"../weatherst1/showallgraphs.php\">Graphs - Γραφήματα</a></li>
          <li class=\"active\"><a href=\"../weatherst1/review_data3.php\">Measurement - Μετρήσεις</a></li>
          <li class=\"active\"><a href=\"../weatherst1/review_location.php\">Location - Τοποθεσία</a></li>
        </div>
        </div><div style=\"width:700px; margin:0 auto;\"><h1>Raspberry Pi Weather Station Log</h1><table class=\"table table-striped table-bordered\">".
"<thead> <tr>".
"	<th style='width:100px;'>ID</th>".
"	<th style='width:100px;'>Station_ID</th>".
"	<th style='width:100px;'>Date and Time</th>".
"	<th style='width:100px;'>Latitude</th>".
"	<th style='width:100px;'>Longitude</th>".
"   </tr>".
"</thead><tbody>";

//Sql Select statement
$SQL = "SELECT * FROM log";

// Retrieve all records and display them
$result = mysqli_query($con, $SQL);

// process every record

while( $row = mysqli_fetch_array( $result ) )
{
	echo "<tr>";
	echo "<td>" .$row['id']. "</td>";
	echo "<td>" .$row['station_name']. "</td>";
	echo "<td>" .$row['stamp']. "</td>";
	echo "<td>" .$row['latitude']. "</td>";
	echo "<td>" .$row['longitude']. "</td></tr>";
	
}

echo "</tbody></table></div><!-- Footer -->
<footer class=\"page-footer font-small blue pt-4\">
<!-- Copyright -->
  <div class=\"footer-copyright text-center py-3\">© 2018-2019 Copyright:
    <a href=\"https://esperinoepalierapetras.blogspot.com\"> Εσπερινό ΕΠΑΛ Ιεράπετρας</a>
  </div>
  <!-- Copyright -->

</footer></body></html>";
mysqli_close($con);

?> 

