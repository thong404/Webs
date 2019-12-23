<!DOCTYPE html>
<html>
<?php
   session_start(); 
 ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <title>Week | Chart</title>
    </head>
<body>

    <section id="chart">
        <div class="container">
            <div id="curve_chart" style="width: 100%; height: 500px"></div>
            </div>
      
        </div>
    </section>

    <footer>
        <p>Copyright &copy; 2019</p>
    </footer>

</body>




<?php
  include("connect.php");
  $query = "SELECT time_data, temp FROM node2";
  $result = mysqli_query($con, $query);
  ?>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', 'temp'],
          <?php
          while($row = mysqli_fetch_assoc($result))
          {
            echo " ['".$row['time_data']."', ".$row['temp']."],   ";
          }
          ?>
        ]);

        var options = {
          title: 'Real-time',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>