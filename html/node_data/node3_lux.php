<?php
	include("../connect.php");
	$result = mysqli_query($con,"SELECT * FROM node3 ORDER BY id DESC LIMIT 1");
	while($row = mysqli_fetch_array($result)){
		echo $row['lux'].' lx';
	}
?>  

<?php
	include("../connect.php");
	$query = mysqli_query($con,"SELECT * FROM node3 ORDER BY id DESC LIMIT 1");
	$querys = mysqli_query($con,"SELECT * FROM node_3 ORDER BY id DESC LIMIT 1");
	$exist = mysqli_num_rows($query);
	$exists = mysqli_num_rows($querys);
	if(($exist > 0) && ($exists > 0)){
		while(($row = mysqli_fetch_assoc($query))&&($rows = mysqli_fetch_assoc($querys)))
		{		
		if ($row['lux'] > $rows['max_lux']){
			echo "
			<script>
				document.getElementById('threshold_lux03').innerHTML= 'Hight' ;
				document.getElementById('lux03').style.backgroundColor = 'red';
				document.getElementById('lux03').style.color = 'white';   
			</script>
				";
		}
		elseif ($row['lux'] < $rows['min_lux']) {
			echo "
			<script>
				document.getElementById('threshold_lux03').innerHTML= 'Low' ;
				document.getElementById('lux03').style.backgroundColor = '#35424a';
				document.getElementById('lux03').style.color = 'white';
			</script>
				";
		}
		else 
			echo "
			<script>
				document.getElementById('threshold_lux03').innerHTML= 'Normal' ;
			</script>
				";
		}
	}
?>  