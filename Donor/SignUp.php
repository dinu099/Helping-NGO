<!DOCTYPE HTML>
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
		if(!isset($user) and empty($user)){
			
		echo
		"
		<html>
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
									<ul>
										<li class=\"special\">
											<a href=\"#menu\" class=\"menuToggle\"><span>Menu</span></a>
											<div id=\"menu\">
												<ul>
													<li><a href=\"home.php\">Home</a></li>
													<li><a href=\"login.php\">Sign In</a></li>
													<li><a href=\"SignUp.php\">Sign Up</a></li>
													<li><a href=\"team.php\">About Us</a></li>
													<li><a href=\"faq.php\">FAQ</a></li>
												</ul>
											</div>
										</li>
									</ul>
								</nav>
							</header>

						<!-- Main -->
							<article id=\"main\">
								<header>
									<h2 style=\"font-size:25px;\">Sign Up</h2>
									<center>
									<div class=\"login\" style=\"width:600px;\">
										<form action=\"SignUpManager.php\" method=\"POST\">
										<div class=\"login1\">
											<input type=\"text\" name=\"Fullname\" placeholder=\"Fullname\" required>
										</div><br>
										<div class=\"login1\">
											<input type=\"text\" name=\"mobile\" placeholder=\"Contact no.\" required maxlength=\"10\">
										</div><br>
										<div class=\"login1\">
											<input type=\"email\" name=\"email\" placeholder=\"Email address\" required>
										</div><br>
										<div class=\"login1\">
											<input type=\"password\" name=\"password\" placeholder=\"Password\" required maxlength=\"12\">
										</div><br>
										<div class=\"login1\">
											<input type=\"password\" name=\"cpswd\" placeholder=\"Confirm Password\" required>
										</div>
										<br>
										<div class=\"login1\">
											<input type=\"submit\" name=\"user_register\" value=\"Register\">
										</div>
										<br><br> Already Registered? <a href=\"login.php\">Login here</a>.
										</form> 
									</div>
									</center>
								</header>
								
						<!-- Footer -->
							<footer id=\"footer\">
								<ul class=\"icons\">
									<li><a href=\"https://twitter.com/helpingngo3\" class=\"icon fa-twitter\"><span class=\"label\">Twitter</span></a></li>
									<li><a href=\"https://www.facebook.com/helpingngo3/\" class=\"icon fa-facebook\"><span class=\"label\">Facebook</span></a></li>
									<li><a href=\"https://www.instagram.com/helpingngo3/\" class=\"icon fa-instagram\"><span class=\"label\">Instagram</span></a></li>
									<li><a href=\"mailto:helpingngo3@gmail.com\" class=\"icon fa-envelope-o\"><span class=\"label\">Email</span></a></li>
								</ul>
								<ul class=\"copyright\">
									<li>&copy; <a href=\"home.php\">Helping NGO</a></li><li>2017</li>
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
			header("refresh:0; url=pledge.php");
			echo "<script>alert('Already Logged in. Logout first to register');</script>";
		}
}
	else{
		echo('cannot connect to database');
		
	}
}	
?>