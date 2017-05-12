<!DOCTYPE html>
<?php
error_reporting(0);
$mysql_host="localhost";
$mysql_user='root';
$mysql_password='';

if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password))
	{
		echo("cannot connect to database");
	}
else{
	if(@mysql_select_db("donor")){
		session_start();
		$user=$_SESSION['user'];
		if(isset($user) and !empty($user)){
		echo
		"<html>
		<head>
				<title>Helping NGO</title>
				<meta charset=\"utf-8\" />
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
				<link rel=\"stylesheet\" href=\"../assets/css/main.css\" />
				<link rel=\"stylesheet\" href=\"../assets/css/style.css\" />
		</head>
		<body>
			<!-- Page Wrapper -->
					<div id=\"page-wrapper\">
						<!-- Header -->
							<header id=\"header\">
								<h1><a href=\"home.php\">Helping NGO</a></h1>
								<nav id=\"nav\">
									<ul>Hi "; 
										require_once "user_name.php";
										echo $name['name'];
										echo"!
										<li class=\"special\">
											<a href=\"#menu\" class=\"menuToggle\"><span>Menu</span></a>
											<div id=\"menu\">
												<ul>
													<li><a href=\"home.php\">Home</a></li>
													<li><a href=\"#\">View Pledge</a></li>
													<li><a href=\"pledge.php\">Make Pledge</a></li>
													<li><a href=\"logout.php\">Logout</a></li>
												</ul>
											</div>
										</li>
									</ul>
								</nav>
							</header>

						<!-- Main -->
							<article id=\"main\">
								<header>
									<h2 style=\"font-size:25px; padding-top:-100px;\">Your Donation</h2>
									<center>
										<form action=\"#\" method=\"POST\">
											<table style=\"width:90%\">
												<thead>
													<tr>
													  <th>Name</th>
													  <th>Email Id</th>
													  <th>Mobile</th>
													  <th>Address</th>
													  <th>Pincode</th>
													  <th>Item</th>
													  <th>Quantity</th>
													</tr>
												</thead>
												<tbody>";
												include_once("printViewPledge.php");
												echo"</tbody>
											</table>
										</form>
									</center>
								</header>
								
						<!-- Footer -->
							<footer id=\"footer\">
								<ul class=\"icons\">
									<li><a href=\"#\" class=\"icon fa-twitter\"><span class=\"label\">Twitter</span></a></li>
									<li><a href=\"#\" class=\"icon fa-facebook\"><span class=\"label\">Facebook</span></a></li>
									<li><a href=\"#\" class=\"icon fa-instagram\"><span class=\"label\">Instagram</span></a></li>
									<li><a href=\"#\" class=\"icon fa-envelope-o\"><span class=\"label\">Email</span></a></li>
								</ul>
								<ul class=\"copyright\">
									<li>&copy; <a href=\"#\">Helping NGO</a></li><li>2017</li>
								</ul>
							</footer>

					</div>

				<!-- Scripts -->
					<script src=\"../assets/js/jquery.min.js\"></script>
					<script src=\"../assets/js/jquery.scrollex.min.js\"></script>
					<script src=\"../assets/js/jquery.scrolly.min.js\"></script>
					<script src=\"../assets/js/skel.min.js\"></script>
					<script src=\"../assets/js/util.js\"></script>
					<!--[if lte IE 8]><script src=\"assets/js/ie/respond.min.js\"></script><![endif]-->
					<script src=\"../assets/js/main.js\"></script>
		</body>
		</html>";
		}
		else{
			header("refresh:0; url=login.php");
			echo "<script>alert('Please Login to continue.');</script>";
		}
}
	else{
		echo('cannot connect to database');
		
	}
}	
?>
