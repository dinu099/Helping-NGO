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
		$result=mysql_query("SELECT name,email,contact FROM new_donor where email='$user';");
		$row=mysql_fetch_assoc( $result );
		echo
		"<html>
		<head>
				<title>Helping NGO</title>
				<meta charset=\"utf-8\" />
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
				<link rel=\"stylesheet\" href=\"../assets/css/main.css\" />
				<link rel=\"stylesheet\" href=\"../assets/css/style.css\" />
				<link rel=\"stylesheet\" href=\"chosen.css\">
				
				
				<script>
					function getLocation() {
						if (navigator.geolocation) {
							navigator.geolocation.getCurrentPosition(showPosition);
						}
					}
					function showPosition(position) {
						var x=position.coords.latitude;
						var y=position.coords.longitude;
						document.getElementById('lat').value=x;
						document.getElementById('lng').value=y;
						
					}
					</script>
		</head>
		<body onload=\"getLocation()\">
			<!-- Page Wrapper -->
					<div id=\"page-wrapper\">
						<!-- Header -->
							<header id=\"header\">
								<h1><a href=\"home.php\">Helping NGO</a></h1>
								<nav id=\"nav\">
									<ul><li><a href=\"user.php\">Hi "; 
										require_once "user_name.php";
										echo $name['name'];
										echo"!</a></li>
										<li class=\"special\">
											<a href=\"#menu\" class=\"menuToggle\"><span>Menu</span></a>
											<div id=\"menu\">
												<ul>
													<li><a href=\"home.php\">Home</a></li>
													<li><a href=\"viewPledge.php\">View Pledge</a></li>
													<li><a href=\"pledge.php\">Make Pledge</a></li>
													<li><a href=\"team.php\">About Us</a></li>
													<li><a href=\"faq.php\">FAQ</a></li>
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
									<h2 style=\"font-size:25px; padding-top:-100px;\">Donation Details</h2>
									<center>
									<div class=\"login\" style=\"width:600px;\">
										<form action=\"PledgeMaker.php\" method=\"POST\">
										  <input type=\"text\" name=\"name\" value=\"{$row['name']}\" readonly>
										  <br>
										  <input type=\"text\" name=\"email\"  value=\"{$row['email']}\" readonly>
										  <br>
										  <input type=\"text\" name=\"contact\"  value=\"{$row['contact']}\" readonly>
										  <br>
										  <input type=\"text\"  name=\"address\" placeholder=\"Address\" required>
										  <br>
										   <input type=\"text\"  name=\"pin\" placeholder=\"Enter zipcode\" required maxlength=\"6\">
										  <br>
										  <!--Bug 86, Multiple selection dropdown list->
										  
										  <select name=\"drop[]\" data-placeholder=\"Select the Items...\" class=\"chosen-select\" multiple tabindex=\"4\">
											<option value=\"\"></option>
											<option value=\"Books\" style=\"font-size:15px;\">Books</option>
											<option value=\"Notebook\" style=\"font-size:15px;\">Notebook</option>
											<option value=\"Utensils\" style=\"font-size:15px;\">Utensils</option>
											<option value=\"Clothes\" style=\"font-size:15px;\">Clothes</option>
											<option value=\"Quilts\" style=\"font-size:15px;\">Quilts</option>
											<option value=\"Bedsheets\" style=\"font-size:15px;\">Bedsheets</option>
										  </select><br>
										  
										  <br>
										  <input type=\"text\"  name=\"quantity\" placeholder=\"quantity\" required  /><br>
										  
										  
										  
										  
										  <input type=\"hidden\" name=\"latitude\" id=\"lat\" value=\"\" readonly>
										  <input type=\"hidden\" name=\"longitude\" id=\"lng\" value=\"\" readonly>
										  <br><br>
										  
										  <input type=\"submit\" value=\"Submit\">
										</form> 
									</div>
									</center>
								</header>
							</article>	
						<!-- Footer -->
							<footer id=\"footer\">
								<ul class=\"icons\">
									<li><a href=\"https://twitter.com/helpingngo3\" class=\"icon fa-twitter\"><span class=\"label\">Twitter</span></a></li>
									<li><a href=\"https://www.facebook.com/helpingngo3\" class=\"icon fa-facebook\"><span class=\"label\">Facebook</span></a></li>
									<li><a href=\"https://www.instagram.com/helpingngo3\" class=\"icon fa-instagram\"><span class=\"label\">Instagram</span></a></li>
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
					  <script src=\"chosen.jquery.js\" type=\"text/javascript\"></script>
					  <script src=\"docsupport/prism.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
					  <script src=\"docsupport/init.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
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
