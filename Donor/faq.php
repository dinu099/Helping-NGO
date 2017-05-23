<html>
			<head>
				<title>Helping NGO</title>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<link rel="stylesheet" href="../assets/css/main.css" />
				<link rel="stylesheet" href="../assets/css/style.css" />
			</head>
			<body>

				<!-- Page Wrapper -->
					<div id="page-wrapper">
						<!-- Header -->
							<header id="header">
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

						<!-- Main -->
							<article id="main">
								<br><center>
									<h2 style="font-size:25px; padding-top:-100px;">FAQ</h2>
										<p>
										Q1:- What is 'Helping NGO'?<br>

										Ans:- 'Helping NGO' is an initiative where the overall process of <br>
										donation is made easier at both the donor's end and the NGO'S end.<br><br>

										Q2:- How is this done exactly?<br>

										Ans:- We have designed this overall product so that anybody willing to <br>
										donate can create an account and could use this for making donation. <br><br>


										Q3:- How will this help the NGOs?<br>

										Ans:-As the NGOs will have a complete list of all the donors from different<br> 
										areas, they can use these information for sending volunteers to the areas <br>
										where there are optimum number of donors.<br><br>

										Q4:-How are notifications send to the volunteers?<br>

										Ans:-Whenever arranging of pickups are done by the NGO, an email notification<br>
										is sent to different volunteers notifying abount there respective pickups.<br><br>

										Q5:-Is the product an app or a website?<br>

										Ans:- For the NGO and the donors we have no app but the website but for the<br>
										volunteers we have designed the app.<br><br>

										Q6:-What are the things that we can donate?<br>

										Ans:-It can be used for donating items ranging from books, clothes, copies,<br> 
										utensils and many more. <br><br>

										Q7:- Is this service paid or free for NGOs?<br>

										Ans:- As it is a social initiative and we are a 'not for profit' organization<br>
										hence it is totally free.<br><br>

										Q8:-Can this service be availed online?<br>

										Ans:- No. This is because there is interaction going on between three seperate<br> 
										entities which can only be carried online.<br><br>

										Q9:-What are the system requirements for the service?<br>

										Ans:-There are no special requirements. The service can be availed on any basic<br> 
										android mobile or any computer having an internet connection.<br><br>

										Q10:-Do 'Helping NGO' provide physical help to the NGOs?<br>

										Ans:- No. We do not provide our staffs to the NGOs availing our service. We<br>
										could though assist them on any issue over our product on the telephone.<p>      
									</center>
								
								
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

				<!-- Scripts -->
					<script src="../assets/js/jquery.min.js"></script>
					<script src="../assets/js/jquery.scrollex.min.js"></script>
					<script src="../assets/js/jquery.scrolly.min.js"></script>
					<script src="../assets/js/skel.min.js"></script>
					<script src="../assets/js/util.js"></script>
					<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
					<script src="../assets/js/main.js"></script>

			</body>
		</html>