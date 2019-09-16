<?php require('server.php'); ?>
<?php 	
	//session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "register an account first";
		header('location: register.php');
	}
?>
<?php require('connect-db.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>KENTOUR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
                <style>
                    form, .content {
                        width: 30%;
                        margin: 0px auto;
                        padding: 20px;
                        border: 1px solid #B0C4DE;
                        background: white;
                        border-radius: 0px 0px 10px 10px;
                    }
                    .input-group {
                        margin: 10px 0px 10px 0px;
                    }
                    body {
                        font-size: 120%;
                        background: #F8F8FF;
                    }
                    .input-group input {
                        height: 30px;
                        width: 93%;
                        padding: 5px 10px;
                        font-size: 16px;
                        border-radius: 5px;
                        border: 1px solid gray;
                    }
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
				<form class="login100-form validate-form" method="post" action="selectguarantor.php">
					<span class="login100-form-avatar">
						<img src="images/avatar-01.jpg" alt="AVATAR"><br>
					</span>
					
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
                        Select First guarantor   
                        <div class="input-group">
                            <?php                  
                                $result = $conn->query("select username FROM  members WHERE accountStatus='ACTIVE'");
                                echo "<select name='guarantor1' class='input-group'>";
                                while ($row = $result->fetch_assoc()) {
                                    unset($name);
                                    $name = $row['username']; 
                                    echo '<option value="'.$name.'">'.$name.'</option>';      
                                }
                                echo "</select>";
                            ?>
                        </div>
						Select second guarantor   
                        <div class="input-group">
                            <?php                  
                                $result = $conn->query("select username FROM  members WHERE accountStatus='ACTIVE' ");
                                echo "<select name='guarantor2' class='input-group'>";
                                while ($row = $result->fetch_assoc()) {
                                    unset($name);
                                    $name = $row['username']; 
                                    echo '<option value="'.$name.'">'.$name.'</option>';      
                                }
                                echo "</select>";
                            ?>
                        </div>
                        <?php  $uname= $_SESSION['username']; ?> 
                        <input name="userName" value="<?=$uname?>" style="opacity: 0;" />
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn"  type ="submit"  name="add_guarantors">
							Complete signup
						</button>
						<a href="#" class="txt2">
							...almost done <?php echo $_SESSION['username'];?>⊂(◉‿◉)つ
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>