<html>
<head>
    <style>
/* This stylesheet sets the width of all images to 100%: */
img {
  width: 100%;
}
</style>
  <title>Εσπερινό ΕΠΑΛ Ιεράπετρας - Raspberry Pi Weather Station</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/main.css">
 
</head>

<body>
  <div class="page-header">
  
  </div>

  <div class="container">
     <a class="navbar-brand" href="../weatherst1/index.php"><img src="../imgs/logo_mnae.jpg" alt="MIA NEA ARXH STA EPAL">
        </a>
    <h1 class="text-center">Εσπερινό ΕΠΑΛ Ιεράπετρας - Μια Νέα Αρχή στα ΕΠΑΛ </h1>
    <h1 class="text-center">Raspberry Pi Weather Station  - Project 2018-2019</h1>
     <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       </div>
       <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="../weatherst1/index.php">Home - Αρχική</a></li>
          <li class="active"><a href="../weatherst1/showallgraphs.php">Graphs - Γραφήματα</a></li>
          <li class="active"><a href="../weatherst1/review_data3.php">Measurement - Μετρήσεις</a></li>
          <li class="active"><a href="../weatherst1/review_location.php">Location - Τοποθεσία</a></li>
        </div>
        </div>
    <div style="width:700px; margin:0 auto;">
    <table class="table table-striped table-bordered table-dark">
        <thead> <tr>
            <td style='width:100px;' class="align-baseline">Graph Environment - Γραφικές Παραστάσεις</td>
            <td class='width:100px;' class="align-baseline">Measurement - Μετρήσεις</td>
            <td class='width:100px;' class="align-baseline">Location of Meteo - Τοποθεσία</td>
            <td class='width:100px;' class="align-baseline">Anemometer measure from PLC - Μέτρηση Ανέμου</td>
          </tr>
<?php
// Connect to MySQL
include("dbConnector.php");
$con=connectToDb();


    // Used for row color toggle
    //$oddrow = true;
    
    //if($oddrow = !$oddrow)

        echo "<tbody class=\"table table-dark\"><tr>";
        echo "<td style =\"width:100px;\" class=\"align-middle\"><a href=\"showallgraphs.php\">Graphs Environment</a></td>";
        echo "<td style=\"width:100px;\" class=\"align-middle\"><a href=\"review_data3.php\">View Measurement</a></td>";
        echo "<td style=\"width:100px;\" class=\"align-middle\"><a href=\"review_location.php\">View Location of Meteo</a></td>";
        echo "<td style=\"width:100px;\" class=\"align-middle\"><a href=\"showimage.html\">View Anemometer measure from PLC</a></td>";
        echo "</tr></tbody>";
    
?>
    </table>
<div></div>
<div></div>
<div></div>
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
