<?php
class Arrange{
function assignArea(){
	
	echo"
		<html lang=\"en\">

		<head>

			<meta charset=\"utf-8\">
			<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
			<meta name=\"description\" content=\"\">
			<meta name=\"author\" content=\"\">

			<title>Helping NGO</title>

			<link href=\"assets/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

			<link href=\"assets/vendor/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
			<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

			<!-- Plugin CSS -->
			<link href=\"assets/vendor/magnific-popup/magnific-popup.css\" rel=\"stylesheet\">

			<!-- Theme CSS -->
			<link href=\"assets/css/creative.min.css\" rel=\"stylesheet\">
		</head>

		<body id=\"page-top\">

			<nav id=\"mainNav\" class=\"navbar navbar-default navbar-fixed-top\">
				<div class=\"container-fluid\">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class=\"navbar-header\">
						<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
							<span class=\"sr-only\">Toggle navigation</span> Menu <i class=\"fa fa-bars\"></i>
						</button>
						<a class=\"navbar-brand page-scroll\" href=\"homeNGO.php\">Helping NGO</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
						<ul class=\"nav navbar-nav navbar-right\">
							<li>
								<a class=\"page-scroll\" href=\"homeNGO.php\">Home</a>
							</li>
							<li>
								<a class=\"page-scroll\" href=\"#contact\">Contact Us</a>
							</li>
							<li>
								<a class=\"page-scroll\" href=\"#about\">Logout</a>
							</li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>

			<header>
				<div class=\"header-content\">
					<div class=\"header-content-inner\"><br><br>
						<center><b><font style=\"font-size:30px;\">Area List</font></b><br><br>
						<div class=\"col-sm-8 col-sm-offset-2\">
							<form action=\"volunteer.php\" method=\"POST\">
								<table class=\"table table-bordered table-fixed\" style=\"color:white; font-size:20px;\">
									<thead>
										<tr>
										  <th class=\"col-sm-3\">Select</th>
										  <th class=\"col-sm-6\">Pincode</th>
										  <th class=\"col-sm-3\">No. of Donors</th>
										</tr>
									</thead>
									<tbody>";
									include_once("donationTable.php");
									echo"</tbody>
								</table>
								<br><br>
								<center>
									<input class=\"btn btn-default btn-xl\" type=\"submit\" name=\"view\" value=\"Arrange Pickup\" style=\"color:red; width:250px;\"\">
								</center>
							</form>
							</div>
						</center>
					</div>
				</div>
			</header>
			
			
			<section id=\"contact\">
				<div class=\"container\">
					<div class=\"row\">
						<div class=\"col-lg-8 col-lg-offset-2 text-center\">
							<h2 class=\"section-heading\">Let's Get In Touch!</h2>
							<hr class=\"primary\">
							<p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
						</div>
						<div class=\"col-lg-4 col-lg-offset-2 text-center\">
							<i class=\"fa fa-phone fa-3x sr-contact\"></i>
							<p>123-456-6789</p>
						</div>
						<div class=\"col-lg-4 text-center\">
							<i class=\"fa fa-envelope-o fa-3x sr-contact\"></i>
							<p><a href=\"mailto:your-email@your-domain.com\">feedback@startbootstrap.com</a></p>
						</div>
					</div>
				</div>
			</section>

			<!-- jQuery -->
			<script src=\"assets/vendor/jquery/jquery.min.js\"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src=\"assets/vendor/bootstrap/js/bootstrap.min.js\"></script>

			<!-- Plugin JavaScript -->
			<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js\"></script>
			<script src=\"assets/vendor/scrollreveal/scrollreveal.min.js\"></script>
			<script src=\"assets/vendor/magnific-popup/jquery.magnific-popup.min.js\"></script>

			<!-- Theme JavaScript -->
			<script src=\"assets/js/creative.min.js\"></script>

		</body>

		</html>";
}
}
?>
