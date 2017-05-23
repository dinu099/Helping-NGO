<!DOCTYPE HTML>

<html>
	<head>
		<title>Helping NGO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	
	<style>
	html {
	  box-sizing: border-box;
	}

	*, *:before, *:after {
	  box-sizing: inherit;
	}

	.column {
	  float: left;
	  width: 25%;
	  margin-bottom: 16px;
	  padding: 0 20px;
	  transition: width 1s;
	  transition-delay:0.2s;
	}
	.column:hover {
	  width: 28%;
	}

	@media (max-width: 650px) {
	  .column {
		width: 105%;
		display: block;
		transition: width 1s;
	  }
	  .column:hover {
	  width: 114%;
	}
	}
	.card {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	}

	.container {
	  padding: 0 16px;
	}

	.container::after, .row::after {
	  content: "";
	  clear: both;
	  display: table;
	}

	.title {
	  color: grey;
	}
	.test1{
		transition:2s;
	}
	.test2{
		transition:2s;
	}
	.test3{
		transition:2s;
	}
	.test4{
		transition:2s;
	}
	.test5{
		transition:2s;
	}
	.test6{
		transition:2s;
	}
	.test1:hover {
	  color: #3b5998;
	  font-size:30px;
	  transform:rotate(360deg);
	}
	
	.test2:hover {
	  font-size:30px;
	  color: #007bb6;
	  transform:rotate(360deg);
	}
	.test3:hover {
	  font-size:30px;
	  color: white;
	  transform:rotate(360deg);
	}
	.test4:hover {
	  font-size:30px;
	  color: #cc0000;
	  transform:rotate(360deg);
	}
	.test5:hover {
	  font-size:30px;
	  color: #00001a;
	  transform:rotate(360deg);
	}
	</style>
	
	</head>
	<body class="landing">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="home.php">Helping NGO</a></h1>
						<nav id="nav">
							<ul><li><a href="user.php">Hi
									<?php
										require_once "user_name.php";
										$user=$name['name'];
										if(isset($user)and !empty($user)){
											echo $user;
										}
										else{
											echo "Guest";
										}
									?>!</a>
								</li>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="home.php">Home</a></li>
											<!-------------------------------------------------------------------->
											
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
															"<li><a href=\"viewPledge.php\">View Pledge</a></li>
															<li><a href=\"pledge.php\">Make Pledge</a></li>
															<li><a href=\"logout.php\">Logout</a></li>";
														}
														else{
															echo "
															<li><a href=\"login.php\">Sign In</a></li>
															<li><a href=\"SignUp.php\">Sign Up</a></li>";
															
														}
														}
														else{
															echo('cannot connect to database');
															
														}
													}	
													?>
											
											
											<!---------------------------------------------------------------------->
											<li><a href="#">About Us</a></li>
											<li><a href="faq.php">FAQ</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
					<section id="banner">
							<div class="inner">
								<h2>The Team</h2>
							</div>
							<div class="row">
							  <div style="padding:80px;"></div>
							  <div class="column">
								<div class="card">
								  <img src="../images/piyush.jpg" alt="John" style="width:100%">
								  <div class="container">
									<h3>Piyush<br>Ranjan</h3>
									<p class="title">Project Manager<br></p>
									<div class="icons">
										<a class="icon" href="http://www.facebook.com" target="blank"><i class="fa fa-facebook-square fa-lg test1" aria-hidden="true"></i></a>&nbsp;
										<i class="fa fa-linkedin-square fa-lg test2" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-phone-square fa-lg test3" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-envelope fa-lg test4" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-github-square fa-lg test5 aria-hidden="true"></i>
									</div>
									<br>
								  </div>
								</div>
							  </div>

							  <div class="column">
								<div class="card">
								  <img src="../images/ankit.jpg" alt="John" style="width:100%">
								  <div class="container">
									<h3>Ankit<br>Kumar</h3>
									<p class="title">QA Engineer<br></p>
									<div class="icons">
										<a class="icon" href="http://www.facebook.com" target="self"><i class="fa fa-facebook-square fa-lg test1" aria-hidden="true"></i></a>&nbsp;
										<i class="fa fa-linkedin-square fa-lg test2" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-phone-square fa-lg test3" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-envelope fa-lg test4" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-github-square fa-lg test5 aria-hidden="true"></i>
									</div>
									<br>
								  </div>
								</div>
							  </div>
							  <div class="column">
								<div class="card">
								  <img src="../images/raunak.jpg" alt="John" style="width:100%">
								  <div class="container">
									<h3>Raunak<br>Tibrewal</h3>
									<p class="title">QA Manager<br></p>
									<div class="icons">
										<a class="icon" href="http://www.facebook.com" target="parent"><i class="fa fa-facebook-square fa-lg test1" aria-hidden="true"></i></a>&nbsp;
										<i class="fa fa-linkedin-square fa-lg test2" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-phone-square fa-lg test3" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-envelope fa-lg test4" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-github-square fa-lg test5 aria-hidden="true"></i>
									</div>
									<br>
								  </div>
								</div>
							  </div>
							</div> 
					</section>

					<section id="banner">
							<div class="row">
							<div style="padding:80px;"></div>
							  <div class="column">
								<div class="card">
								  <img src="../images/narayan.jpg" alt="John" style="width:100%">
								  <div class="container">
									<h3>Narayan<br>Soni</h3>
									<p class="title">Lead Developer<br></p>
									<div class="icons">
										<a class="icon" href="http://www.facebook.com" target="top"><i class="fa fa-facebook-square fa-lg test1" aria-hidden="true"></i></a>&nbsp;
										<i class="fa fa-linkedin-square fa-lg test2" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-phone-square fa-lg test3" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-envelope fa-lg test4" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-github-square fa-lg test5 aria-hidden="true"></i>
									</div>
									<br>
								  </div>
								</div>
							  </div>
					
							  <div class="column">
								<div class="card">
								  <img src="../images/dinesh1.jpg" alt="John" style="width:100%">
								  <div class="container">
									<h3>Dinesh Kumar<br>Mandal</h3>
									<p class="title">Developer<br></p>
									<div class="icons">
										<a class="icon" href="http://www.facebook.com"><i class="fa fa-facebook-square fa-lg test1" aria-hidden="true"></i></a>&nbsp;
										<i class="fa fa-linkedin-square fa-lg test2" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-phone-square fa-lg test3" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-envelope fa-lg test4" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-github-square fa-lg test5 aria-hidden="true"></i>
									</div>
									<br>
								  </div>
								</div>
							  </div>
							  <div class="column">
								<div class="card">
								  <img src="../images/chinmay.jpg" alt="John" style="width:100%">
								  <div class="container">
									<h3>Chinmay<br>Anand</h3>
									<p class="title">Developer<br></p>
									<div class="icons">
										<a class="icon" href="http://www.facebook.com"><i class="fa fa-facebook-square fa-lg test1" aria-hidden="true"></i></a>&nbsp;
										<i class="fa fa-linkedin-square fa-lg test2" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-phone-square fa-lg test3" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-envelope fa-lg test4" aria-hidden="true"></i>&nbsp;
										<i class="fa fa-github-square fa-lg test5 aria-hidden="true"></i>
									</div>
									<br>
								  </div>
								</div>
							  </div>
							</div>
							
					</section>
				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="https://twitter.com/helpingngo3" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/helpingngo3/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/helpingngo3/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="mailto:helpingngo3@gmail.com" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; <a href="#">Helping NGO</a></li><li>2017</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts-->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
	</body>
</html>