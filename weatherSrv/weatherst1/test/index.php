<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Μετεωρολογικός Σταθμός - Εσπερινό ΕΠΑ.Λ. Ιεράπετρας</title>
    <meta charset="utf-8">
    <!-- Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<script src="weatherst1/test/bootstrap/js/jquery.min.js"></script>
	<script src="weatherst1/test/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
  	<?php include('dbConnector.php');  $con=connectToDb(); ?>
	<style>
	.post-title { font-size:20px; }
	.mtb-margin-top { margin-top: 20px; }
	.top-margin { border-bottom:2px solid #ccc; margin-bottom:20px; display:block; font-size:1.3rem; line-height:1.7rem;}
	</style>
	<div class="container-fluid mtb-margin-top">
		<div class="row">
			<div class="col-md-12">
				<h1 class="top-margin">Raspberry Pi Weather Station Logs</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							
							<th style='width:50px;'>ID</th>
							<th style='width:150px;'>Station_ID</th>
							<th style='width:100px;'>Temperature</th>
							<th style='width:100px;'>Humidity</th>
							<th style='width:100px;'>Pressure</th>
							<th style='width:200px;'>Date and Time</th>
						</tr>
					</thead>
					<tbody>
				<?php
				/*How many records you want to show in a single page.*/
				$limit = 10;
				/*How may adjacent page links should be shown on each side of the current page link.*/
				$adjacents = 2;
				/*Get total number of records */
				$sql = "SELECT COUNT(*) total_rows FROM data_1";
				$res = mysqli_fetch_object(mysqli_query($con, $sql));
				$total_rows = $res->total_rows;
				/*Get the total number of pages.*/
				$total_pages = ceil($total_rows / $limit);
				
				
				if(isset($_GET['page']) && $_GET['page'] != "") {
					$page = $_GET['page'];
					$offset = $limit * ($page-1);
				} else {
					$page = 1;
					$offset = 0;
				}


				$query  = "select * from data_1 ORDER BY id DESC limit $offset, $limit";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_array($result)) {
						echo  '<tr>
							<td style="width:50px;" align="center">' .$row['Id']. '</td>
							<td style="width:150px;" align="center">' .$row['station_id']. '</td>
							<td style="width:100px;" align="center">' .$row['temperature']. '</td>
							<td style="width:100px;" align="center">' .$row['humidity']. '</td>
							<td style="width:100px;" align="center">' .$row['pressure']. '</td>
							<td style="width:200px;" align="center">' .$row['creation_time']. '</td>
							</tr>';
					}
				}
				?>
</tbody>
</table>
<?php

				//Checking if the adjacent plus current page number is less than the total page number.
				//If small then page link start showing from page 1 to upto last page.
				if($total_pages <= (1+($adjacents * 2))) {
					$start = 1;
					$end   = $total_pages;
				} else {
					if(($page - $adjacents) > 1) {				   //Checking if the current page minus adjacent is greateer than one.
						if(($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
							$start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
							$end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
						} else {								   //If current page plus adjacents is greater than total pages.
							$start = ($total_pages - (1+($adjacents*2)));  //then the page range will start from total pages minus 1+($adjacents*2)
							$end   = $total_pages;						   //and the end will be the last page number that is total pages number.
						}
					} else {									   //If the current page minus adjacent is less than one.
						$start = 1;                                //then start will be start from page number 1
						$end   = (1+($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
					}
				}
				//If you want to display all page links in the pagination then
				//uncomment the following two lines
				//and comment out the whole if condition just above it.
				/*$start = 1;
				$end = $total_pages;*/
				?>
				
				<?php if($total_pages > 1) { ?>
					<ul class="pagination pagination-sm justify-content-center">
						<!-- Link of the first page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
				<?php } ?>
				<?php mysqli_close($con); ?>
 			</div>
 		</div>
     </div> 
</body>
</html>
