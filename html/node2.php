<!DOCTYPE html>
<html>
<?php
	session_start();
?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Display environment temparature,humidity,soil humidity,lux">
		<meta name="author" content="TriThong">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<title>Welcome</title>
	</head>
<body>
	<header>
		<div class="container">
			<nav>
				<ul>
					<li class="current"><a href="home.php"><i class="fa fa-home"></i></a></li>
					<li class="key"><a href="key.php"><i class="fa fa-key"></i></a></li>
					<div class="list">
					<li><a href="#" class="menu-item">WEEK</a></li>
						<div class="node_list">
							<a href="node_1_week.php" class="week_list_node">Node 1</a>
							<a href="node_1_week.php" class="week_list_node">Node 2</a>
							<a href="node_1_week.php" class="week_list_node">Node 3</a>
							<a href="node_1_week.php" class="week_list_node">Node 4</a>
							
						</div>
					</div>
					<div class="list">
					<li><a href="#" class="menu-item">MONTH</a></li>
						<div class="node_list">
							<a href="#" class="week_list_node">Node 1</a>
							<a href="#" class="week_list_node">Node 2</a>
							<a href="#" class="week_list_node">Node 3</a>
							<a href="#" class="week_list_node">Node 4</a>
							
						</div>
					</div>
					<div class="list">
					<li><a href="#" class="menu-item">YEAR</a></li>
						<div class="node_list">
							<a href="#" class="week_list_node">Node 1</a>
							<a href="#" class="week_list_node">Node 2</a>
							<a href="#" class="week_list_node">Node 3</a>
							<a href="#" class="week_list_node">Node 4</a>
							
						</div>
					</div>
					<form action="search.php" method="POST" value="submit-search">
					<input type="text" name="search" class="search_box" placeholder="iSearch...">
					<li><a class="search_icon" href="#"><i class="fa fa-search"></i></a></li>
					</form>
				</ul>
			</nav>
		</div>
	</header> 

	<section id="showcase">
		<div class="container">
			<h1>Display The Environment Data</h1>
			<p>" Make everything simple "</p>
		</div>
	</section>

	<section id="boxes">
		<div class="container_boxes">
			<div class="box">
				<h1 class="icon"><a href="node_1.php" class="icon_1" >02</a></h1>
				<div class="container_boxes_1">
					<div class="temp" id="temp02">
						<h3>TEMPERATURE</h3>
						<h1 id="tempv02">01</h1>
						<p id="threshold_temp02">Threshold</p>
					</div>
					<div class="lux" id="lux02">
						<h3>LUX</h3>
						<h1 id="luxv02">01</h1>
						<p id="threshold_lux02">Threshold</p>
					</div>
					<div class="humidity" id="humi02">
						<h3>HUMIDITY</h3>
						<h1 id="humiv02">01</h1>
						<p id="threshold_humi02">Threshold</p>
					</div>
					<div class="soil_humidity" id="shumi02">
						<h3>SOIL HUMIDITY</h3>
						<h1 id="shumiv02">01</h1>
						<p id="threshold_shumi02">Threshold</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<p>Copyright &copy; 2019</p>
	</footer>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  			$('.search_icon').click(function(){
  				$('.menu-item').toggleClass('hide-item')
  				$('.search_box').toggleClass('active')
  			})
  	})
  </script>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function(){
			$('#tempv02').load('node_data/node2_temp.php')
			$('#luxv02').load('node_data/node2_lux.php')
			$('#humiv02').load('node_data/node2_humi.php')
			$('#shumiv02').load('node_data/node2_shumi.php')
		}, 1);
	});
</script>