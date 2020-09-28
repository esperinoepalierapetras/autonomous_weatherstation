<?php 
    // Start MySQL Connection
    include("dbConnector.php");
    $con=connectToDb(); 


?>

<html>
<head>
    <title>Raspberry Pi Weather Station Logs</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<div style="width:700px; margin:0 auto;">
<h1>Raspberry Pi Weather Station Log</h1>
<table class="table table-striped table-bordered">
<thead>
    <tr>
	<th style='width:100px;'>ID</th>
	<th style='width:100px;'>Station_ID</th>
	<th style='width:100px;'>Temperature</th>
	<th style='width:100px;'>Humidity</th>
	<th style='width:100px;'>Pressure</th>
	<th style='width:100px;'>Date and Time</th>
	<th style='width:100px;'>Rain</th>
    </tr>
</thead>
<tbody>
    

<?php
		//Get the Cuurent Page Number
		if (isset($_GET['page_no']) && $_GET['page_no']!=""){
		    $page_no = $_GET['page_no'];
		}
		else {
		    $page_no = 1;
		    $offset = 0;
		}
		//Set Total Records Per page value
		$total_records_per_page = 10;
		
		// Calculate offset Value and Set other Variables
		$offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = 2;
		
		//Get the total number of pages for pagination
		//$total_records = 0;
		$result_count = mysqli_query($con, "SELECT COUNT(*) As total_records FROM  measurement");
		$total_records = mysqli_fetch_array($result_count);
		$total_records = $total_records['total_records'];
		$total_no_of_pages = ceil($total_records / $total_records_per_page);
		$second_last = $total_no_of_pages - 1;
		
		//Sql Select statement
		$SQL = "SELECT * FROM measurement LIMIT $offset, $total_records_per_page";
		//$sql= "SELECT * FROM 'raindrops' LIMIT $offset, $total_records_per_page"; "SELECT * FROM 'data_1' LIMIT $offset, $total_records_per_page";
		// Retrieve all records and display them
		$result = mysqli_query($con, $SQL);

		// process every record
		if(mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_array($result))
		    {
			echo "<tr>";
			echo "<td>" .$row['Id']. "</td>";
			echo "<td>" .$row['station_id']. "</td>";
			echo "<td>" .$row['temperature']. "</td>";
			echo "<td>" .$row['humidity']. "</td>";
			echo "<td>" .$row['pressure']. "</td>";
			echo "<td>" .$row['creation_time']. "</td>";
			echo "<td>" .$row['rain']. "</td></tr>";
		}}
	    
?>
</tbody>
</table>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<ul class="pagination">
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	    <a <?php if($page_no > 1){echo "href='?page_no=$previous_page'";} ?>>Previous</a>
    </li>
	    <?php
		if($total_no_of_pages <= 10){
		    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
			    echo "<li class='active'><a>$counter</a></li>";
			} else {
			    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
			}
		    }
		}
		elseif ($total_no_of_pages > 10){
		    if ($page_no <= 4) {
			for ($counter = 1; $counter < 8; $counter++){
			    if ($counter == $page_no){
			    echo "<li class='active'><a>$counter</a></li>";
			}else{
			    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
			}
		}
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
	    }
		elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
		    echo "<li><a href='?page_no=1'>1</a></li>";
		    echo "<li><a href='?page_no=2'>2</a></li>";
		    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
			if ($counter == $page_no) {
			    echo "<li class='active'><a>$counter</a></li>";
			} else {
			    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
			}
		    }
		    echo "<li><a>...</a></li>";
		    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		    echo "<li> <a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		    
	    }
	    else {
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2/a></li>";
		echo "<li><a>...</a></li>";
		
		for ($counter == $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++){
		    if ($counter == $page_no) {
			echo "<li class='active'><a>$counter</a></li>";
		    } else {
			echo "<li><a href='?page_no=$counter'>$counter</a></li>";
		    }
		}
	    }
?>
    <li <?php if($page_no >= $total_no_of_pages){echo "class='disabled'";} ?>>
	<a <?php if($page_no < $total_no_of_pages) {echo "href='?page_no=$next_page'";} ?>>Next</a>
    </li>
	<?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
	

</ul>
</body>
</html>

