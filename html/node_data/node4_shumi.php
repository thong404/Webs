<?php
	include("../connect.php");
	$result = mysqli_query($con,"SELECT * FROM node4 ORDER BY id DESC LIMIT 1");
	while($row = mysqli_fetch_array($result)){
		echo $row['shumi'].'%';
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
		if ($row['shumi'] > $rows['max_shumidity']){
			echo "
			<script>
				document.getElementById('threshold_shumi04').innerHTML= 'Hight' ;
				document.getElementById('shumi04').style.backgroundColor = 'red';
				document.getElementById('shumi04').style.color = 'white';   
			</script>
				";
		}
		elseif ($row['shumi'] < $rows['min_shumidity']) {
			echo "
			<script>
				document.getElementById('threshold_shumi04').innerHTML= 'Low' ;
				document.getElementById('shumi04').style.backgroundColor = '#35424a';
				document.getElementById('shumi04').style.color = 'white';
			</script>
				";
		}
		else 
			echo "
			<script>
				document.getElementById('threshold_shumi04').innerHTML= 'Normal' ;
			</script>
				";
		}
	}
?>