<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Display environment temparature,humidity,soil humidity,lux">
		<meta name="author" content="TriThong">
		<link rel="stylesheet" type="text/css" href="css/key.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<title>Login | Register</title>
	</head>
<body>
	<header>
		<div class="container">
			<nav>
				<ul>
					<li><a href="index.php"><i class="fa fa-home"></i></a></li>
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

	<section id="key">
		<div class="container">
			<div id="login">
				<button class="open_button" onclick="openForm_1()">Login</button>
					<div class="login" id="myForm_1">
						<form action="checklogin.php" method="POST" class="form_login">
							<h1>Login</h1>
							<label for="email"><b>Email</b></label>
							<input type="text" name="username" placeholder="Enter Email" required>
							<label for="psw"><b>Password</b></label>
							<input type="password" name="password" placeholder="Enter Password" required>
							<br>
							<button type="submit" class="button_login" value="Login">Login</button>
							<br>
							<button type="button" class="button_close_1" onclick="closeForm_1()">Close</button>
						</form>
					</div>
			</div>
			<div id="register">
				<button class="open_button" onclick="openForm_2()">Register</button>
					<div class="register" id="myForm_2">
						<form action="key.php" method="POST" class="form_register">
							<h1>Register</h1>
							<label for="email"><b>Email</b></label>
							<input type="text" name="username" placeholder="Enter Email" required>
							<label for="psw"><b>Password</b></label>
							<input type="password" name="password" placeholder="Enter Password" required>
							<br>
							<button type="submit" class="button_register" value="Register">Register</button>
							<br>
							<button type="button" class="button_close_2" onclick="closeForm_2()">Close</button>
						</form>
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
</html>
<?php
$con = mysqli_connect("localhost","thong7991","raspberry","second_db");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $bool = true;
  mysqli_connect("localhost", "thong7991","raspberry") or die(mysql_error()); //Connect to server
  mysqli_select_db($con,"second_db") or die("Cannot connect to database"); //Connect to database
  $query = mysqli_query($con,"Select * from users"); //Query the users table
  while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("key.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysqli_query($con,"INSERT INTO users (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("key.php");</script>'; // redirects to register.php
  }
}
?>
