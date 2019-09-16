<?php require('server.php')?>
<?php 

	//session_start(); 

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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>KENTOUR</title> 
<!-- For-Mobile-Apps-and-Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                <style>
					.error {
						width: 92%; 
						margin: 0px auto; 
						padding: 10px; 
						border: 1px solid #a94442; 
						color: #a94442; 
						background: #f2dede; 
						border-radius: 5px; 
						text-align: left;
					}
				</style>
				<div class="welcome"> 
					<h3 class="w3ls-title"><?php echo strtoupper($_SESSION['username']);?></h3> 
					<p class="w3title-text">The following is the account summary </p>
					<div class="welcome-info">
                    <div style="padding: 6px 12px; border: 1px solid #ccc;height:auto; verflow: auto;">
                        <form action="payloans.php" method="post">
                        <?php include('errors.php'); ?>

						    <!-- [ SELECT LOAN ID ] -->
                        </form>
							</div>
                        
							<br>

						 <!-- <p>[[ Lands APLLIED]]</p> -->
						<?php
							error_reporting(0);
							ini_set('display_errors', 0);
						?>
						 <div style="padding: 6px 12px; border: 1px solid #ccc;height:auto; verflow: auto;">
                            <form action="paylands.php" method="post">
                                <?php include('errors.php'); ?>

                                    <!-- [ SELECT LOAN ID ] -->
                                    <div class="form-group">
                                    <label for="amount">Select Land</label>
                                    <?php
                                        require('connect-db.php');
                                        $user = $_SESSION['username'];

                                        $sql = "SELECT * FROM landapplications WHERE status='APPROVED' AND memberid='$user'";
										$result = mysqli_query($conn, $sql);
										echo '<div><select name="landid" class="form-group">';
                                        while($row = mysqli_fetch_array($result, MYSQLI_NUM))
                                        {	
                                          echo '<option value='.$row[0].'>'.$row[2]."  ".$row[3].'</option> '; // l ID 
										}
										echo '</select></div>';
                                    ?>
                                    </div>
                                    <!-- [ input amount ] -->
                                    <div class="form-group">
                                        <label for="amount">Enter Amount</label>
                                        <input type="number" class="form-control" name="repayAmount"  min="0" max="9999999" maxlength="6" >
                                    </div>
									<div class="form-group">
										<label for="amount">Select Mode</label>
										<select type="text" class="form-control" name="mode" >
											<option>Cash</option>
											<option>Cheque</option>
											<option>Bank Deposit</option>
										</select>
									</div>
									<?php
										$sql = "SELECT * FROM members WHERE username='$user'";
										$result = mysqli_query($conn, $sql);
										while($row = mysqli_fetch_array($result, MYSQLI_NUM))
										{	
											$userid = $row[0];
										}
									?>

                            <input name="username" value="<?=$user?>" style="opacity: 0;"/>
                            <input name="mid" value="<?=$userid?>" style="opacity: 0;" />
                                    <div class="form-group">
                                        <button type="submit"  class="btn btn-success" name="repay_land">PAY LAND</button>
                                    </div>
                                    
                                </form>
							</div>



							 
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