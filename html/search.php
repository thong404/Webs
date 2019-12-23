<!DOCTYPE html>
<html>
<?php
	session_start();
?>
<head>
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
	<title>Search</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<h1><a href="index.php"><i class="fa fa-home"></i></a></h1>
	<h1>Search Page</h1>

		<?php
			include("connect.php");
			if(isset($_POST['search'])){
				$search = mysqli_real_escape_string($con, $_POST['search']);
				$sql = "SELECT * FROM node1 WHERE time_data LIKE '%$search%' ";
				$sql_node2 = "SELECT * FROM node2 WHERE time_data LIKE '%$search%' ";
				$sqls = "SELECT * FROM search WHERE node LIKE '%$search' OR node1 LIKE '%$search%' OR month LIKE '%$search%' OR year LIKE '%$search%' ";
				$sql_table = "SELECT * FROM search WHERE table_data LIKE '%$search%' ";
				$result = mysqli_query($con, $sql);
				$result_node2 = mysqli_query($con, $sql_node2);
				$result_table = mysqli_query($con, $sql_table);
				$queryResult = mysqli_num_rows($result);
				$queryResult_node2 = mysqli_num_rows($result_node2);
				$queryResult_table = mysqli_num_rows($result_table);
				$results = mysqli_query($con, $sqls);
				$queryResults = mysqli_num_rows($results);

				if($queryResults > 0){
					while($rows = mysqli_fetch_array($results)){
						if ($rows['node'] == 'node 1'){
							echo  "<a href='node1.php?'>".$rows['node']."</a><br><br>";
							echo  "<a href='node_1_week.php?'>".$rows['node1']."</a><br><br>";
							echo  "<a href='node_1_month.php?'>".$rows['month']."</a><br><br>";
							echo  "<a href='node_1_year.php?'>".$rows['year']."</a><br>";
							echo "<br>";
						}
						if ($rows['node'] == 'node 2'){
							echo  "<a href='node2.php?'>".$rows['node']."</a><br><br>";
							echo  "<a href='node_2_week.php?'>".$rows['node1']."</a><br><br>";
							echo  "<a href='node_2_month.php?'>".$rows['month']."</a><br><br>";
							echo  "<a href='node_2_year.php?'>".$rows['year']."</a><br>";
							echo "<br>";
						}
						if ($rows['node'] == 'node 3'){
							echo  "<a href='node3.php?'>".$rows['node']."</a><br><br>";
							echo  "<a href='node_3_week.php?'>".$rows['node1']."</a><br><br>";
							echo  "<a href='node_3_month.php?'>".$rows['month']."</a><br><br>";
							echo  "<a href='node_3_year.php?'>".$rows['year']."</a><br>";
							echo "<br>";
						}
						if ($rows['node'] == 'node 4'){
							echo  "<a href='node4.php?'>".$rows['node']."</a><br><br>";
							echo  "<a href='node_4_week.php?'>".$rows['node1']."</a><br><br>";
							echo  "<a href='node_4_month.php?'>".$rows['month']."</a><br><br>";
							echo  "<a href='node_4_year.php?'>".$rows['year']."</a><br>";
							echo "<br>";
						}
						
					}
				}
				if($queryResult_table > 0){
					while($row_table = mysqli_fetch_array($result_table)){
						if($row_table['table_data'] == 'table node 1'){
							echo  "<a href='table_node1.php?'>".$row_table['table_data']."</a><br><br>";
						}
						if($row_table['table_data'] == 'table node 2'){
							echo  "<a href='table_node2.php?'>".$row_table['table_data']."</a><br><br>";
						}
						if($row_table['table_data'] == 'table node 3'){
							echo  "<a href='table_node3.php?'>".$row_table['table_data']."</a><br><br>";
						}
						if($row_table['table_data'] == 'table node 4'){
							echo  "<a href='table_node4.php?'>".$row_table['table_data']."</a><br><br>";
						}
						if($row_table['table_data'] == 'table'){
							echo  "<a href='table.php?'>".$row_table['table_data']."</a><br><br>";
						}
						
					}
				}


				
				
			}
		?>
</body>
</html>

						