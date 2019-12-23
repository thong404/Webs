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
		<link rel="stylesheet" type="text/css" href="css/node_1_week.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<title>Week | Chart</title>
	</head>
<body>
	<header>
		<div class="container">
			<nav>
				<ul>
					<li><a href="home.php"><i class="fa fa-home"></i></a></li>
					<li class="current"><a href="key.php"><i class="fa fa-key"></i></a></li>
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

	<section id="chart">
		<div class="container">
			<div id="chart_temp" style="height: 300px; width: 90%; margin: 25px auto;">
			</div>
			<div id="chart_lux" style="height: 300px; width: 90%; margin: 25px auto;">
			</div>
			<div id="chart_humidity" style="height: 300px; width: 90%; margin: 25px auto;">
			</div>
			<div id="chart_shumidity" style="height: 300px; width: 90%; margin: 25px auto;">
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

  
<script type="text/javascript">
window.onload = function () {
    var chart_temp = new CanvasJS.Chart("chart_temp",
    {
        title: {
            text: "Temperature"               
        },
        axisX:{ 
            title: "Time",     
            valueFormatString: "DD-MM" ,
        },
        axisY: {
            title: "Temperature (oC)",
      },

      data: [
      {        
        type: "spline",
        color: "rgba(0,75,141,0.7)",
        dataPoints: [

        { x: new Date(2019, 10, 25), y: 30, indexLabel: "{y}"},       
        { x: new Date(2019, 10, 26), y: 32, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 27), y: 33, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 28), y: 33, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 29), y: 32, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 30), y: 31, indexLabel: "{y}"},
        { x: new Date(2019, 11,  1), y: 30, indexLabel: "{y}"} 
        ]
    }
    
    ]
});
/*
function hIndexLabel() {      
	var length = chart_temp.options.data[0].dataPoints.length;
      for( i = 0; i < length; i++ ) {
        if( chart_temp.options.data[0].dataPoints[i].y > x) {
            chart_temp.options.data[0].dataPoints[i].indexLabelFontColor = "red";
        }
        else
          chart_temp.options.data[0].dataPoints[i].indexLabel = chart_temp.options.data[0].dataPoints[i].indexLabel;
      }      
}

hIndexLabel();
*/

chart_temp.render();

var chart_lux = new CanvasJS.Chart("chart_lux",
    {
        title: {
            text: "Lux"               
        },
        axisX:{ 
            title: "Time",     
            valueFormatString: "DD-MMM" ,
        },
        axisY: {
            title: "Lux (lumen)",
      },

      data: [
      {        
        type: "spline",
        color: "rgba(0,75,141,0.7)",
        dataPoints: [

        { x: new Date(2019, 10, 25), y: 501, indexLabel: "{y}"},       
        { x: new Date(2019, 10, 26), y: 510, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 27), y: 512, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 28), y: 495, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 29), y: 501, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 30), y: 509, indexLabel: "{y}"},
        { x: new Date(2019, 11,  1), y: 503, indexLabel: "{y}"} 
        ]
    }
    
    ]
});

chart_lux.render();

var chart_humidity = new CanvasJS.Chart("chart_humidity",
    {
        title: {
            text: "Humidity"               
        },
        axisX:{ 
            title: "Time",     
            valueFormatString: "DD-MMM" ,
        },
        axisY: {
            title: "Humidity (%)",
      },

      data: [
      {        
        type: "spline",
        color: "rgba(0,75,141,0.7)",
        dataPoints: [

        { x: new Date(2019, 10, 25), y: 50, indexLabel: "{y}"},       
        { x: new Date(2019, 10, 26), y: 51, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 27), y: 53, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 28), y: 60, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 29), y: 55, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 30), y: 51, indexLabel: "{y}"},
        { x: new Date(2019, 11,  1), y: 53, indexLabel: "{y}"} 
        ]
    }
    
    ]
});

chart_humidity.render();

var chart_shumidity = new CanvasJS.Chart("chart_shumidity",
    {
        title: {
            text: "Soil-Humidity"               
        },
        axisX:{ 
            title: "Time",     
            valueFormatString: "DD-MMM" ,
        },
        axisY: {
            title: "Soil-Humidity (%)",
      },

      data: [
      {        
        type: "spline",
        color: "rgba(0,75,141,0.7)",
        dataPoints: [

        { x: new Date(2019, 10, 25), y: 75, indexLabel: "{y}"},       
        { x: new Date(2019, 10, 26), y: 65, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 27), y: 60, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 28), y: 52, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 29), y: 75, indexLabel: "{y}"}, 
        { x: new Date(2019, 10, 30), y: 71, indexLabel: "{y}"},
        { x: new Date(2019, 11,  1), y: 64, indexLabel: "{y}"} 
        ]
    }
    
    ]
});

chart_shumidity.render();
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js">
</script>





</html>

<?php
	$con = mysqli_connect("localhost","thong7991","raspberry","second_db");
	mysqli_connect("localhost", "thong7991","raspberry") or die(mysql_error()); 
	mysqli_select_db($con,"second_db") or die("Cannot connect to database"); 
	$query = mysqli_query($con,"SELECT max_temp FROM node_1 ");
	$row = mysqli_fetch_assoc($query);
	$threshold = $row['max_temp'];	
?>