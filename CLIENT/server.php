<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$cdate = date("Y-m-d");
	$ctime = date("h:i:s");

	//connect to database
	//user: africand
	//Databse: africand_kentour
	$db = mysqli_connect('localhost', 'africand_muchemi', 'Muchemi254', 'africand_kentour');


	// REGISTER USER
	if (isset($_POST['reg_member'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phone = mysqli_real_escape_string($db, $_POST['telNo']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$acntStatus = "INNACTIVE";

		// form validation: ensure that the form is correctly filled
		function validate_phone_number($phone)
		{
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the lenght of number
			// This can be customized if you want phone number from a specific country
			if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 14) {
			return false;
			} else {
			return true;
			}
		}
		//VALIDATE PHONE NUMBER 
		if (validate_phone_number($phone) !=true) {
			array_push($errors, "Invalid phone number");
		}

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($phone)) { array_push($errors, "Telephone Number Required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		
		$sql_u = "SELECT * FROM members WHERE username='$username'";
		$res_u = mysqli_query($db, $sql_u);
		if (mysqli_num_rows($res_u) > 0) { array_push($errors, "Sorry Username has already been taken"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO members (username, email, password, tel, accountStatus) 
					  VALUES('$username', '$email', '$password','$phone', '$acntStatus')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			header('location: selectguarantor.php');
		}

	}
	
	//Add Guarantor to the user
	if (isset($_POST['add_guarantors'])) {
		$guar1 = mysqli_real_escape_string($db, $_POST['guarantor1']);
		$guar2 = mysqli_real_escape_string($db, $_POST['guarantor2']);
		$uname = mysqli_real_escape_string($db, $_POST['userName']);
		$stat = "PENDING";
		
		if ($guar1==$guar2){ 
		    array_push($errors, "Kindy Select Different Guarators"); 
		}
		
		if (count($errors) == 0) {
			$query = "UPDATE members
					SET guarantor1 = '$guar1', g1status='$stat', guarantor2='$guar2', g2status='$stat'
					WHERE username='$uname'";
		    mysqli_query($db, $query);
		   // header('location: index.php');
		    $query0 = "SELECT * FROM members WHERE username='$uname' ";
    		$result0 = mysqli_query($db, $query0);
    		while($row = mysqli_fetch_array($result0, MYSQLI_NUM))
    		{
    			$uid = $row[0];
    		}

    		$required = '500000';
    		$paid = '0';
    		$query2 = "INSERT INTO accountpayment (userid, username, required, paid, balance ) 
    				  VALUES('$uid', '$uname', '$required','$paid', '$required')";
    		mysqli_query($db, $query2);
    
    		$_SESSION['username'] = $uname;
    	 	header('location: index.php');
    			
    		}
	}
	
	// LOGIN A MEMBER 
	if (isset($_POST['login_member'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM members WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	//PAY REGISTRATION FEE
	// 
	if (isset($_POST['pay_reg_fee'])) {
		// receive all input values from the form
		$paidamount = mysqli_real_escape_string($db, $_POST['amount']);
		$mode = mysqli_real_escape_string($db, $_POST['mode']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$userid = mysqli_real_escape_string($db, $_POST['userid']);
		
		$sql = "SELECT * FROM members WHERE username='$username' and id='$userid'";
		$result = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($result, MYSQLI_NUM))
		{	
			$g1status = $row[6];
			$g2status = $row[8];
		}
		
	    $sql3 = "SELECT * FROM accountpayment WHERE userid='$userid'";
		$result3 = mysqli_query($db, $sql3);
		while($rowt = mysqli_fetch_array($result3, MYSQLI_NUM))
		{	
			$acntbal = $rowt[5];
		}
        
        
		$status = 'PENDING';

		// form validation: ensure that the form is correctly filled
		if ($paidamount > $acntbal ) { array_push($errors, "You cannot pay more than the Balance "); }
		if (empty($paidamount)) { array_push($errors, "input amount"); }
		if ($g1status != 'APPROVED') { array_push($errors, "Guarantor 1 has not approved you"); }
		if ($g2status != 'APPROVED') { array_push($errors, "Guarantor 2 has not approved you"); }

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO registrationpayments(userid, username, paidamount, date, time, status, mode ) 
					  VALUES('$userid', '$username', '$paidamount','$cdate', '$ctime', '$status', '$mode')";
			mysqli_query($db, $query);

			echo '<script> alert("Payment Successful!"); </script>';
			header("refresh; url=index.php");
			// header('location: index.php');
		}

	}

	// APPLY A CASH LOAN 
	if (isset($_POST['apply_loan'])) {
		$amount = mysqli_real_escape_string($db, $_POST['amount']);
		$purpose = mysqli_real_escape_string($db, $_POST['purpose']);
		$uname = mysqli_real_escape_string($db,$_POST['userID']);

		$query1 = "SELECT * FROM accountpayment WHERE username='$uname' ";
		$result1 = mysqli_query($db, $query1);
		while($row = mysqli_fetch_array($result1, MYSQLI_NUM))
		{
			$acbal = $row[5];
		}

		$query2 = "SELECT * FROM members WHERE username='$uname' ";
		$result2 = mysqli_query($db, $query2);
		while($row = mysqli_fetch_array($result2, MYSQLI_NUM))
		{
			$acstat = $row[9];
		}

		if (empty($amount)) { array_push($errors, "Enter Amount");}
		if (empty($purpose)) { array_push($errors, "Enter purpose for applying loan");}
		if (empty($uname)) { array_push($errors, "You need to Login");}
		
		if ($acbal > 100 )  { array_push($errors, "You must first clear Registration fee"); }
		if ($acstat == 'INNACTIVE' )  { array_push($errors, "Your Account is INNACTIVE"); }
		

		$status = 'PENDING';
		$duedate = date('y-m-d', strtotime("+30 days"));
		
		$query0 = "SELECT * FROM members WHERE username='$uname' ";
		$result0 = mysqli_query($db, $query0);
		while($row = mysqli_fetch_array($result0, MYSQLI_NUM))
		{
			$uid = $row[0];
		}
		

		if (count($errors) == 0) {
			$query ="INSERT INTO cashloans (amount, dateapplied, timeapplied, datedue, memberid, membername, purpose, status) 
								VALUES('$amount', '$cdate', '$ctime','$duedate', '$uid','$uname','$purpose','$status')";
			$results = mysqli_query($db, $query);
			
            echo '<script> alert("Application Successful!"); </script>';
			header("refresh; url=index.php");
			if ($results) {
				echo '<script> alert("Loan Applied Successfully"); </script>';
				header("refresh; url=aloan.php");	
			}else {
				array_push($errors, "Wrong username/password combination");
			}
			echo '<script> alert("Application Successful!"); </script>';
			header("refresh; url=index.php");


			
		}
	}

	// APPLY FOR LAND 
	if (isset($_POST['apply_land'])) {
		$lid = mysqli_real_escape_string($db, $_POST['lid']);
		$memid = mysqli_real_escape_string($db, $_POST['userID']);

		$query2 = "SELECT * FROM members WHERE username='$memid' ";
		$result2 = mysqli_query($db, $query2);
		while($row = mysqli_fetch_array($result2, MYSQLI_NUM))
		{
			$acstat = $row[9];
		}
		if ($acstat == 'INNACTIVE' )  { array_push($errors, "Your Account is INNACTIVE"); }

		$sql = "SELECT * FROM land WHERE lid='$lid' ";
		$result0 = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($result0, MYSQLI_NUM))
		{	
			$ltitle = $row[1];
			$lcost = $row[3];
		}

		$status = 'PENDING';
		$cdate = date("y-m-d");

		if (count($errors) == 0) {
			$query ="INSERT INTO landapplications (landid, landtitle, cost, memberid, dateapplied, status) 
									VALUES('$lid', '$ltitle','$lcost', '$memid','$cdate','PENDING')";
			$results=mysqli_query($db, $query);
			
            echo '<script> alert("Application Successful!"); </script>';
			header("refresh; url=index.php");
			if ($results){
				$query1 ="UPDATE land SET status='UNAVAILABLE' WHERE lid='$lid'";
				mysqli_query($db, $query1);

				echo '<script> alert("Application Successful!"); </script>';
			    header("refresh; url=index.php");
			}else{
				array_push($errors, "coulnd't pay");
			}
			echo '<script> alert("Application UnSuccessful!"); </script>';
			header("refresh; url=index.php");
		}
	}

	// REPAY LAND 
	if (isset($_POST['repay_land'])) {
		error_reporting(0); 
		$landid = mysqli_real_escape_string($db, $_POST['landid']);
		$amount = mysqli_real_escape_string($db, $_POST['repayAmount']);
		$mode = mysqli_real_escape_string($db, $_POST['mode']);
		$mid = mysqli_real_escape_string($db, $_POST['mid']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$status = 'PENDING ';

	
		if (empty($amount)) { array_push($errors, "Enter Amount");}
		if (empty($landid)) { array_push($errors, "You have no lands");}
		

		if (count($errors) == 0) {
			$query0 = "INSERT INTO landpayments (mid, username, landid, amount, mode, date, time, status)
											VALUES ( '$mid', '$username', '$landid', '$amount', '$mode', '$cdate', '$ctime', '$status') ";
			$result0 = mysqli_query($db, $query0);
		
            echo '<script> alert("Payment Successful!"); </script>';
			header("refresh; url=index.php");
			if ($result0){
				echo '<script> alert("Payment Successful!"); </script>';
				header("refresh; url=paylands.php");
				// header('location:paylands.php');
			}else{
				array_push($errors, "coulnd't pay");
			}
		}
	}


    
	if (isset($_POST['enquire'])) {
    	error_reporting(0); 
    	$name= mysqli_real_escape_string($db, $_POST['Name']);
    	$email = mysqli_real_escape_string($db, $_POST['Email']);
    	$subject = mysqli_real_escape_string($db, $_POST['Subject']);
    	$message = mysqli_real_escape_string($db, $_POST['Message']);
    	$cdate = date("Y-m-d");
    	$stat = 'PENDING';
    	
    	if (empty($name)) { array_push($errors, "Your Account name could not be resolved !");}
		if (empty($message)) { array_push($errors, "Enter message please !");}
		
    	if (count($errors) == 0) {
        	$query0 = "INSERT INTO  enquiries (name, email, subject, message, date,status)
    									VALUES ( '$name', '$email', '$subject', '$message', '$cdate','$stat') ";
    		$result0 = mysqli_query($db, $query0);
    		echo '<script> alert("Message Sent Successfully !"); </script>';
			header("refresh; url=contact.php");
        }
	}
	
	
	if (isset($_POST['repay_loan'])) {
		error_reporting(0); 
		$loanID = mysqli_real_escape_string($db, $_POST['loanID']);
		$amount = mysqli_real_escape_string($db, $_POST['repayAmount']);
		$mode = mysqli_real_escape_string($db, $_POST['mode']);
		$mid = mysqli_real_escape_string($db, $_POST['mid']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$status = 'PENDING ';
		
		$sq = "SELECT * FROM cashloans WHERE id ='$loanID'";
		$res = mysqli_query($db, $sq);
		while($rowz = mysqli_fetch_array($res, MYSQLI_NUM)){
		    $tamount = $rowz[1];
		}

		$float = (float)$loanID;
		
		if ($amount > $tamount) { array_push($errors, "You cannot Pay more than the balance");}
		if ($float <= 0) { array_push($errors, "You have no dept remaining for the selected loan");}
		if (empty($loanID)) { array_push($errors, "You have no loan selected / Approved");}
		if (empty($amount)) { array_push($errors, "Enter Amount");}
		

		if (count($errors) == 0) {
			$query0 = "INSERT INTO cashloanpayments (mid, username, loanid, amount, mode , date, time, status)
											VALUES ( '$mid', '$username', '$loanID', '$amount', '$mode', '$cdate', '$ctime', '$status') ";
			$result0 = mysqli_query($db, $query0);
		    echo '<script> alert("Payment Successful!"); </script>';
			header("refresh; url=index.php");

			if ($result0){
				echo '<script> alert("Payment Successful!"); </script>';
			    header("refresh; url=index.php");
				// header('location:index.php');
			}else{
				array_push($errors, "coulnd't pay");
			}
			echo '<script> alert("Payment Successful!"); </script>';
			header("refresh; url=index.php");
		}
	}
  
	if(isset($_POST['select_new_g1'])){
		$guar1 = mysqli_real_escape_string($db, $_POST['guarantor1']);
		$uname = mysqli_real_escape_string($db, $_POST['userName']);

		$stat = "PENDING";
		$query = "UPDATE members SET guarantor1 = '$guar1', g1status='$stat' WHERE username='$uname'";
		mysqli_query($db, $query);
		header('location: myguarantors.php');
	}

	if(isset($_POST['select_new_g2'])){
		$guar2 = mysqli_real_escape_string($db, $_POST['guarantor2']);
		$uname = mysqli_real_escape_string($db, $_POST['userName']);

		$stat = "PENDING";
		$query = "UPDATE members SET guarantor2='$guar2', g2status='$stat' WHERE username='$uname'";
		mysqli_query($db, $query);
		header('location: myguarantors.php');
	}
?>