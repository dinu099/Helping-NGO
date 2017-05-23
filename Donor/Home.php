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
											
											<li><a href="team.php">About Us</a></li>
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
							<h2>Helping NGO</h2>
							<br><br>
							<div>
							<font style="font-size:30px;">दाता लघुः अपि सेव्यः भवति, न कृपणः महान् अपि समृद्ध्या  ।</font></div>
						</div>
						<a href="#one" class="more scrolly">Learn More</a>
					</section>

				<!-- Two -->
					<section id="one" class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="../images/donor_home/image1.jpg" alt="" /></div><div class="content">
								03<sup>rd</sup>, Dec 2016
								<h2 style="color:#DCDCDC;">Footpath, West Bengal</h2>
								<p>Food for the needy around the footpath in Kolkata.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="../images/donor_home/image2.jpg" alt="" /></div><div class="content">
								25<sup>th</sup>, March 2017
								<h2 style="color:#DCDCDC;">Bankura, West Bengal</h2>
								<p style="color:grey;">NGO Volunteers distributing books to the underprivileged children.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="../images/donor_home/image3.jpg" alt="" /></div><div class="content">
								19<sup>th</sup>, Feb. 2017
								<h2 style="color:#DCDCDC;">Keshtopur, VIP, West Bengal</h2>
								<p style="color:grey;">NGO members along with little children, distributing them scholarships.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="../images/donor_home/image4.jpg" alt="" /></div><div class="content">
								28<sup>th</sup>, Jan. 2017
								<h2 style="color:#DCDCDC;">Purulia, Gharhensla, West Bengal</h2>
								<p style="color:grey;">Distribution of books to the children in accordance to the plan for expansion of education.</p>
							</div>
						</section>
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