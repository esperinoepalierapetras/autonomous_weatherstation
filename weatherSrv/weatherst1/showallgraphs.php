<?php
/* Open connection to "zing_db" MySQL database. */
$mysqli = new mysqli("localhost", "weather", "weather", "weatherst");
/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s ", mysqli_connect_error());
    exit();
}

/* Fetch result set from measurement table */
$data=mysqli_query($mysqli,"SELECT temperature, creation_time FROM measurement ORDER BY creation_time");
?>
<script>
var myData=[<?php 
while($info=mysqli_fetch_array($data))
    echo "\"{$info['temperature']}\"," ; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
<?php
$data=mysqli_query($mysqli,"SELECT temperature, creation_time FROM measurement ORDER BY creation_time");
?>
var myLabels=[<?php
while($info=mysqli_fetch_array($data))
    echo "\"{$info['creation_time']}\","; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>
<?php
/* Fetch result set from measurement table */
$data1=mysqli_query($mysqli,"SELECT humidity, creation_time FROM measurement ORDER BY creation_time");
?>
<script>
var myData1=[<?php 
while($info=mysqli_fetch_array($data1))
    echo "\"{$info['humidity']}\"," ; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
<?php
$data1=mysqli_query($mysqli,"SELECT humidity, creation_time FROM measurement ORDER BY creation_time");
?>
var myLabels1=[<?php
while($info=mysqli_fetch_array($data1))
    echo "\"{$info['creation_time']}\","; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>
<?php
/* Fetch result set from measurement table */
$data3=mysqli_query($mysqli,"SELECT pressure, creation_time FROM measurement ORDER BY creation_time");
?>
<script>
var myData3=[<?php 
while($info=mysqli_fetch_array($data3))
    echo "\"{$info['pressure']}\"," ; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
<?php
$data3=mysqli_query($mysqli,"SELECT pressure, creation_time FROM measurement ORDER BY creation_time");
?>
var myLabels3=[<?php
while($info=mysqli_fetch_array($data3))
    echo "\"{$info['creation_time']}\","; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>
<?php
/* Close the connection */
$mysqli->close();
?>
<html>
	<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
    <title>Εσπερινό ΕΠΑΛ Ιεράπετρας - Weather Station Raspberry Pi</title>
	
	<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
	<style>html,body,#myChart { height:100%; width:100%;}
zing-grid[loading]{height:800px;}</style>
</head>
	<body>
		<div class="container">
     <a class="navbar-brand" href="../weatherst1/index.php"><img src="../imgs/logo_mnae.jpg" alt="MIA NEA ARXH STA EPAL">
        </a>
    <h1 class="text-center">Εσπερινό ΕΠΑΛ Ιεράπετρας - Μια Νέα Αρχή στα ΕΠΑΛ </h1>
    <h1 class="text-center">Raspberry Pi Weather Station - Project 2018-2019</h1>
    
       <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="../weatherst1/index.php">Home - Αρχική</a></li>
          <li class="active"><a href="../weatherst1/showallgraphs.php">Graphs - Γραφήματα</a></li>
          <li class="active"><a href="../weatherst1/review_data3.php">Measurement - Μετρήσεις</a></li>
          <li class="active"><a href="../weatherst1/review_location.php">Location - Τοποθεσία</a></li>
        </div>
        </div>
		<div id='myChart'></div>
		<div id='myChart1'></div>
		<div id='myChart2'></div>
	<script>

		var myConfig = {
			"graphset":[
				{
					"type":"line",
					"plot":{
						"aspect":"spline"
					},
					"title":{
						"text":" Θερμοκρασία σε βαθμους Κελσίου - Temperature in Celsius "
					},
					"scale-x":{
						"labels":myLabels,
						 "step": 10800
					},
					"series":[
						{
							"values":myData
						}
					]
				}
			]
		};
		var myConfig1 = {
			"graphset":[
				{
					"type":"line",
					"title":{
						"text":" Υγρασία επι της 100 % - Humidity % "
					},
					"scale-x":{
						"labels":myLabels1,
						"step": 10800
					},
					"series":[
						{
							"values":myData1
						}
					]
				}
			]
		};
		var myConfig2 = {
			"graphset":[
				{
					"type":"line",
					"title":{
						"text":" Ατμοσφαιρική Πίεση σε millibars - Pressure in millibars "
					},
					"scale-x":{
						"labels":myLabels3,
						"step": 10800
					},
					"series":[
						{
							"values":myData3
						}
					]
				}
			]
		};
		zingchart.render({ 
			id : 'myChart', 
			data : myConfig, 
			height : "100%", 
			width: "100%"
		});
		zingchart.render({ 
			id : 'myChart1', 
			data : myConfig1, 
			height : "100%", 
			width: "100%"
		});
		zingchart.render({ 
			id : 'myChart2', 
			data : myConfig2, 
			height : "100%", 
			width: "100%"
		});
	</script>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018-2019 Copyright:
    <a href="https://esperinoepalierapetras.blogspot.com"> Εσπερινό ΕΠΑΛ Ιεράπετρας</a>
  </div>
  <!-- Copyright -->

</footer>
</body>
</html>
