<!DOCTYPE html>
<html>
<?php
   session_start(); 
   if($_SESSION['user']){ 
   }
   else{
      header("location: index.php"); 
   }
?> 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Display environment temparature,humidity,soil humidity,lux">
		<meta name="author" content="TriThong">
		<link rel="stylesheet" type="text/css" href="css/edit.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<title>Welcome | Control</title>
	</head>
<body>
	<header>
		<div class="container">
			<nav>
				<ul>
					<li class="current"><a href="home.php"><i class="fa fa-home"></i></a></li>
					<li class="key"><a href="logout.php"><i class="fa fa-sign-out"></i></a></li>
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
							<a href="node_1_week.php" class="week_list_node">Node 1</a>
							<a href="node_1_week.php" class="week_list_node">Node 2</a>
							<a href="node_1_week.php" class="week_list_node">Node 3</a>
							<a href="node_1_week.php" class="week_list_node">Node 4</a>
							
						</div>
					</div>
					<div class="list">
					<li><a href="#" class="menu-item">YEAR</a></li>
						<div class="node_list">
							<a href="node_1_week.php" class="week_list_node">Node 1</a>
							<a href="node_1_week.php" class="week_list_node">Node 2</a>
							<a href="node_1_week.php" class="week_list_node">Node 3</a>
							<a href="node_1_week.php" class="week_list_node">Node 4</a>
							
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
	<section id="edit">
		<div class="container_node">
			<div id="node">
				<button class="open_button" onclick="openForm_1()">Node One</button>
					<div class="node" id="myForm_1">
						<form action="manual.php" method="POST" class="form_edit">
							<h3>Boom</h3>
							<label for="max_temp"><b>On/Off</b></label>
							<input type="checkbox" name="check[0]" value="1" />
					
					
							<h3>Quat</h3>
							<label for="max_lux"><b>On/Off</b></label>
							<input type="checkbox" name="check[1]" value="1" />
							
							<h3>Suoi</h3>
							<label for="max_humidity"><b>On/Off</b></label>
							<input type="checkbox" name="check[2]" value="1" />
							
							<br>
							<button type="submit" class="button_submit" value="Submit">Submit</button>	
							<button type="button" class="button_close" onclick="closeForm_1()">Close</button>
						</form>
					</div>
				</div>
			<div id="node">
				<button class="open_button" onclick="openForm_2()">Node Two</button>
					<div class="node" id="myForm_2">
						<form action="#" method="POST" class="form_edit">
						
							<button type="submit" class="button_submit" value="Submit">Submit</button>	
							<button type="button" class="button_close" onclick="closeForm_2()">Close</button>
						</form>
					</div>
			</div>
			<div id="node">
				<button class="open_button" onclick="openForm_3()">Node Three</button>
					<div class="node" id="myForm_3">
						<form action="#" method="POST" class="form_edit">
						
							<button type="submit" class="button_submit" value="Submit">Submit</button>	
							<button type="button" class="button_close" onclick="closeForm_3()">Close</button>
						</form>
					</div>
			</div>
			<div id="node">
				<button class="open_button" onclick="openForm_4()">Node Four</button>
					<div class="node" id="myForm_4">
						<form action="#" method="POST" class="form_edit">
				
							<br>
							<button type="submit" class="button_submit" value="Submit">Submit</button>	
							<button type="button" class="button_close" onclick="closeForm_4()">Close</button>
						</form>
					</div>
			</div>
			<!--  
			<div id="node">
				<button class="open_button" onclick="openForm_5()">Node Five</button>
					<div class="node" id="myForm_5">
						<form action="node_5.php" method="POST" class="form_edit">
							<h3>Temperature</h3>
							<label for="max_temp"><b>Max</b></label>
							<input type="number" name="max_temp" placeholder="Type...">
							<label for="min_temp"><b>Min</b></label>
							<input type="number" name="min_temp" placeholder="Type...">
							<h3>Lux</h3>
							<label for="max_lux"><b>Max</b></label>
							<input type="number" name="max_lux" placeholder="Type...">
							<label for="min_lux"><b>Min</b></label>
							<input type="number" name="min_lux" placeholder="Type...">
							<h3>Humidity</h3>
							<label for="max_humidity"><b>Max</b></label>
							<input type="number" name="max_humidity" placeholder="Type...">
							<label for="min_humidity"><b>Min</b></label>
							<input type="number" name="min_humidity" placeholder="Type...">
							<h3>Soil Humidity</h3>
							<label for="max_shumidity"><b>Max</b></label>
							<input type="number" name="max_shumidity" placeholder="Type...">
							<label for="min_shumidity"><b>Min</b></label>
							<input type="number" name="min_shumidity" placeholder="Type...">
							<br>
							<button type="submit" class="button_submit" value="Submit">Submit</button>	
							<button type="button" class="button_close" onclick="closeForm_5()">Close</button>
						</form>
					</div>
			</div>
			-->						
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
  <script>
	function openForm_1() {
	  document.getElementById("myForm_1").style.display = "block";
	}

	function closeForm_1() {
	  document.getElementById("myForm_1").style.display = "none";
	}
</script>
<script>
	function openForm_2() {
	  document.getElementById("myForm_2").style.display = "block";
	}

	function closeForm_2() {
	  document.getElementById("myForm_2").style.display = "none";
	}
</script>
<script>
	function openForm_3() {
	  document.getElementById("myForm_3").style.display = "block";
	}

	function closeForm_3() {
	  document.getElementById("myForm_3").style.display = "none";
	}
</script>
<script>
	function openForm_4() {
	  document.getElementById("myForm_4").style.display = "block";
	}

	function closeForm_4() {
	  document.getElementById("myForm_4").style.display = "none";
	}
</script>
<script>
	function openForm_5() {
	  document.getElementById("myForm_5").style.display = "block";
	}

	function closeForm_5() {
	  document.getElementById("myForm_5").style.display = "none";
	}
</script>
</html>
<?php
	include("connect.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    	
    		$check_0 = isset($_POST['check'][0]) ? 1 : 0;
	        mysqli_query($con,"UPDATE  control SET boom = '$check_0' WHERE id = 1");  
    	
    
    	
    		$check_1 = isset($_POST['check'][1]) ? 1 : 0;      
	        mysqli_query($con,"UPDATE  control SET quat = '$check_1' WHERE id = 1");  
    	

    		$check_2 = isset($_POST['check'][2]) ? 1 : 0;      
	        mysqli_query($con,"UPDATE  control SET suoi = '$check_2' WHERE id = 1");  
    	
    
    }
    else
    {	
    	header("location:edit.php");
    }
?>

