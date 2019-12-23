<!DOCTYPE html>
<html>
<head>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous">
	</script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<style type="text/css">
		body{
			margin-top: 20px;
		}
		.home {
			margin-top: 0;
			padding-top: 0;
			margin-bottom: 5px;
			
		}
		.fa.fa-home{
			color: black;
		}
		#examble{
			padding-top: 20px;
			
		}
		.table{
			text-align: center;
		}
		.table th{
			background-color: #666;
			color: white;
		}
		.table_cells_odd {
            background-color: #CCC;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        #node1{
        	text-align: center;
        	font-weight: bold;
        }
  
	</style>
	<title>Table</title>
</head>
<body>
	<h1 class="home"><a href="index.php"><i class="fa fa-home"></i></a></h1>
	<p id="node1">Node 2</p>
	<table id="examble" class="table" cellpadding="0" width="100%">
		<thead>
			<tr>
				<th>Time</th>
				<th>Temperature</th>
				<th>Lux</th>
				<th>Humidity</th>
				<th>Soil Humidity</th>
			</tr>
		</thead>
		<tbody>
			<?php

				include("connect.php");  
		  		$sql = "SELECT * FROM node2 ";
		  		$result = mysqli_query($con,$sql);
		  		$oddrow = true;
		  		while( $row = mysqli_fetch_array($result))
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
			        echo '   <td'.$css_class.'>'.$row["time_data"].'</td>';
			        echo '   <td'.$css_class.'>'.$row["temp"].'</td>';
			        echo '   <td'.$css_class.'>'.$row["lux"].'</td>';
			        echo '   <td'.$css_class.'>'.$row["humi"].'</td>';
			        echo '   <td'.$css_class.'>'.$row["shumi"].'</td>';
			        echo '</tr>';
			    }
			?>
		</tbody>
	</table>
</body>
<script type="text/javascript">
	$(document).ready( function () {
    $('table.table').DataTable();
	} );
</script>
</html>