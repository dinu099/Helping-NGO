<?php
$filter=new Filter;
$filter->filterResult();
class Filter{
function filterResult(){
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
					<div class=\"header-content-inner\">
						<h1 id=\"homeHeading\">Donor Details</h1>
							<hr>
							<p>List Contains complete details of pledges of selected area.</p>
							<a href=\"#list\" class=\"page-scroll\">
							
							  <input class=\"btn btn-default btn-xl\" type=\"submit\" name=\"view\" value=\"Click Here!\" style=\"color:red; width:250px;\"\">
							</a>
					</div>
				</div>
			</header>
			
			
			<section id=\"list\">
				<div class=\"container\">
					<div class=\"row\">
						<center><b><font style=\"font-size:30px;\">Area List</font></b><br><br>
								<table class=\"table table-bordered\">
									  <thead>
										<tr>
										  <th>Name</th>
										  <th>Email</th>
										  <th>Contact</th>
										  <th>Address</th>
										  <th>Pincode</th>
										  <th>Item</th>
										  <th>Quantity</th>
										</tr>
									  </thead>
									  <tbody>";
									  include_once("selectedDonor.php");
									  echo"</tbody>
									</table>
						</center>
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
