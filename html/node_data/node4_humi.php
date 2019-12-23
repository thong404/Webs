<?php
	include("../connect.php");
	$result = mysqli_query($con,"SELECT * FROM node4 ORDER BY id DESC LIMIT 1");
	while($row = mysqli_fetch_array($result)){
		echo $row['humi'].'%';
	}
?> 
<?php
	include("../connect.php");
	$query = mysqli_query($con,"SELECT * FROM node4 ORDER BY id DESC LIMIT 1");
	$querys = mysqli_query($con,"SELECT * FROM node_4 ORDER BY id DESC LIMIT 1");
	$exist = mysqli_num_rows($query);
	$exists = mysqli_num_rows($querys);
	if(($exist > 0) && ($exists > 0)){
		while(($row = mysqli_fetch_assoc($query))&&($rows = mysqli_fetch_assoc($querys)))
		{		
		if ($row['humi'] > $rows['max_humidity']){
			echo "
			<script>
				document.getElementById('threshold_humi04').innerHTML= 'Hight' ;
				document.getElementById('humi04').style.backgroundColor = 'red';
				document.getElementById('humi04').style.color = 'white';   
			</script>
				";
		}
		elseif ($row['humi'] < $rows['min_humidity']) {
			echo "
			<script>
				document.getElementById('threshold_humi04').innerHTML= 'Low' ;
				document.getElementById('humi04').style.backgroundColor = '#35424a';
				document.getElementById('humi04').style.color = 'white';
			</script>
				";
		}
		else 
			echo "
			<script>
				document.getElementById('threshold_humi04').innerHTML= 'Normal' ;
			</script>
				";
		}
	}
?> 