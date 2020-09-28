<?php
/* Open connection to "zing_db" MySQL database. */
$mysqli = new mysqli("localhost", "weather", "weather", "weatherst");
/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s ", mysqli_connect_error());
    exit();
}

/* Fetch result set from t_test table */
$data=mysqli_query($mysqli,"SELECT temperature, creation_time FROM measurement ORDER BY creation_time LIMIT 10");
?>
<script>
var myData=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'$info['temperature'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
<?php
$data=mysqli_query($mysqli,"SELECT temperature, creation_time FROM measurement ORDER BY creation_time");
?>
var myLabels=[<?php
while($info=mysqli_fetch_array($data))
    echo '"'$info['creation_time'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>
<?php
/* Close the connection */
$mysqli->close();
?>
<html>
	<head>
    <meta charset="utf-8">
    <title>ZingSoft Demo</title>
	
		<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<style>html,body,#myChart { height:100%; width:100%;}
zing-grid[loading]{height:800px;}</style></head>
	<body>
		<div id='myChart'></div>
	<script>

var myConfig = {
    "graphset":[
        {
            "type":"bar",
            "title":{
                "text":"Temperature from MySQL Database"
            },
            "scale-x":{
                "labels":myLabels
            },
            "series":[
                {
                    "values":myData
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
});</script></body>
</html>
