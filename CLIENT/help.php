<?php 
	
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['id']);
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>KENTOUR</title> 
<!-- For-Mobile-Apps-and-Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta name="keywords" content="Fortune Estates Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, SmartPhone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps-and-Meta-Tags -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" href="css/ken-burns.css" type="text/css" media="all" /> 
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<!-- //js -->
<!-- pop-up-box -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	    <script>
			$(document).ready(function() {
				$('.popup-top-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});																							
			}); 
		</script>
<!--//pop-up-box -->
<!-- web-fonts -->  
<link href='//fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- //web-fonts -->
</head>
<body class="bg">
	<div class="agile-main"> 
		<div class="menu-wrap" id="style-1"> 
			<nav class="top-nav">
				<ul class="icon-list">
					<li class="menu-title">KENTOUR </li>
					<li><a class="active" href="index.php"><i class="glyphicon glyphicon-home"></i> Home </a></li>
					<li><a href="aloan.php"><i class="glyphicon glyphicon-briefcase"></i> Apply Loan</a></li>
					<li><a href="aland.php"><i class="glyphicon glyphicon-briefcase"></i> Apply Land</a></li>
					<li><a href="myguarantors.php"><i class="glyphicon glyphicon-eye-close"></i> Guarantors </a></li>
					<li><a href="grequests.php"><i class="glyphicon glyphicon-eye-open"></i> G Requests</a></li>
					<li><a href="#" class="menu"><i class="glyphicon glyphicon-duplicate"></i>Payments<span class="glyphicon glyphicon-menu-down"></span></a>
						<ul class="nav-sub">
							<li><a href="mylands.php"><i class="glyphicon glyphicon-briefcase"></i>My lands</a></li>
							<li><a href="myloans.php"><i class="glyphicon glyphicon-briefcase"></i> My loans</a></li>
						</ul>
						<div class="clearfix"> </div>
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.nav-sub" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script> 
					</li>                                            
					<li><a href="info.php" ><i class="glyphicon glyphicon-list-alt"></i> info</a></li>
					<li><a href="contact.php"><i class="glyphicon glyphicon-envelope"></i> Contact </a></li>
					<li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> Profile</a></li> 
					<li><a href="help.php"><i class="glyphicon glyphicon-list"></i> Help</a></li>
					<li><a href="index.php?logout='1'"><i class="glyphicon glyphicon-user"></i> Logout </a></li>
				</ul>
			</nav>
			<button class="close-button" id="close-button">C</button>
		</div> 
		<div class="content-wrap">
			<div class="header"> 
				<div class="menu-icon">   
					<button class="menu-button" id="open-button">O</button>
				</div>
				<div class="logo">
					<h2><a href="index.php">KENTOUR</a></h2>
				</div>
				<div class="login">
					<a href="" class="sign-in popup-top-anim"><span class="glyphicon glyphicon-user"></span>
						<?php  if (isset($_SESSION['username'])) : ?>
						<?php echo $_SESSION['username']; ?>	
						<?php endif ?>	
					</a> 

				</div> 
				<div class="clearfix"> </div>
			</div>
			<div class="content">
				<!-- banner -->
				
				<!-- //banner -->
				<!-- welcome -->
				<div class="welcome"> 
					<h3 class="w3ls-title">HELP SECTION !</h3> 
					<p class="w3title-text">Knetour Application gives You Access to the various Kentour Services offered to the Members.
					Below are the various steps to successfully using the application and attaining access to our servies
					</p>
					<div class="welcome-info">
						<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
							<div class="clearfix"> </div>
							<div style="padding: 6px 12px; border: 1px solid #ccc; border-radius: 10px; text-align: left; width:100%; ">
								<h3>Regististration</h3>..........
								<p> For a new memeber, one needs to be registered to be able to access our services. During Signup, One needs to select 
								a minimum of teo guarantors before being able to access the account. also 
								one needs.
								
								<br> after registering and selecting the two guarantors, one need to wait for the guarantors to approve them before 
								being able to pay the registration fee of <b>500,000 Ksh </b> for the account to be acctivated.
								</p>
								<h3>Loan Application</h3>------
								<p> 
								One can apply loan if and only if the account has been activated by the Kentour Team. 
								after which then one can wait for the approval of the loan  with regards to the purpose one gives during application
								</p>
								<h3>Land Application</h3>------
								<p> 
								At the land application page, a member can apply to buy land and pay it in installments over time. 
								</p>
								<h3>Repayments</h3>------
								<p> 
							    Land and loan repayments can be done via the bank account, Checques or Cash. after which the Kentor staff will validate
							    the payments and make the necessary deductions 
								</p>
							</div><br>
							<div class="clearfix"> </div>
							<div style="padding: 6px 12px; border: 1px solid #ccc; border-radius: 10px; text-align: left; width:100%; ">
								<h5>SUMMARY</h5>..........
								<p> we cash in cash loans to our registered and approved members. ithe company started at a certain year not that long apache_get_modules
									we can talk about this later though
								</p>
								<h5>HELP</h5>------
								<p> In case of any issues or complications with using our platforms kindlly contact us through out page 
									<a href="contact.php">here</a> or use our adress shorlisted below <br> 
									<strong>Email:</strong> kentour@gmail.com<br>
									<strong>TEL  :</strong> (254)718 610 463 <br>
									<strong>P.O BOX:</strong> 345 - NAIROBI, KENYA
								</p>
							</div>
							<!-- modal-three --> 
							<div id="small-dialog2" class="mfp-hide">
								<div class="login-modal w3ls-search">  
									<div class="booking-info">
										<h3><a href="main.html">Fortune Estates</a></h3>
									</div>
									<div class="login-form">
										<form action="#" method="post">
											<input type="text"  name="city name" placeholder="City Name..." required="">
											<input type="number" name="rooms" placeholder="Bed Rooms" min="1" required=""> 
											<input type="number" name="rooms" placeholder="Bath rooms" min="1"  required=""> 
											<div class="price">
												<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
												<input type="text" placeholder="From" required="">
											</div>
											<div class="price price-right">
												<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
												<input type="text" placeholder="To" required="">
											</div>
											<select class="form-control"> 
												<option value="">Rental</option> 
												<option value="">Buy</option> 
												<option value="">sale</option>  
											</select>
											<input type="submit" value="Search">		
										</form>  
									</div>
								</div>
							</div>
							<!-- //modal-three --> 
						</div>  
					</div>  	
				</div> 
				<!-- //welcome -->
				<!-- properties -->
				<div class="w3agile properties">
					
				</div> 
				<!-- //properties -->

				<!-- footer -->
				<div class="w3agile footer"> 
					<div class="social-icons">
						<ul>
							<li><a href="#"> </a></li>
							<li><a href="#" class="fb"> </a></li>
							<li><a href="#" class="gp"> </a></li>
							<li><a href="#" class="drb"> </a></li>
						</ul>
						<div class="clearfix"> </div>
					</div>
					<div class="footer-nav">
						<ul>  
							<li><a href="index.php"> Home </a></li>
							<li><a href="aloan.php"> Apply loan</a> </li>
							<li><a href="aland.php"> Apply Land </a></li>
							<li><a href="contact.php"> Contact </a></li>
							<li><a href="info.php"> info </a></li>
						</ul> 
						<!-- <div class="clearfix"> </div> -->
					</div> 
					<!-- <div class="footer-text">
						<p>&copy; 2016 Fortune Estates . All Rights Reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
					</div> -->
				</div> 
			</div>
		</div>
	</div> 
	<!-- menu-js -->
	<script src="js/classie.js"></script>
	<script src="js/main.js"></script>
	<!-- //menu-js -->
	<!-- nice scroll-js -->
	<script src="js/jquery.nicescroll.min.js"></script> 
	<script>
		$(document).ready(function() {
	  
			var nice = $("html").niceScroll();  // The document page (body)
		
			$("#div1").html($("#div1").html()+' '+nice.version);
		
			$("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#00F",boxzoom:true}); // First scrollable DIV
		});
	</script>
	<!-- //nice scroll-js -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>