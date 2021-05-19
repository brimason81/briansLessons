<!--	
	Author:		Brian Mason	
	date:		May 5, 2018
	Section:	WEB-215(N01)
	Desc		This page is for users to 
				edit their profile info
-->
<!DOCTYPE html> 
<?php
	/*
		INVOICE FOR SUBSCRIPTION CHANGES - HOW WOULD REFUNDS WORK?
			all other updates work great
	*/
	session_start();
	$fName = $_SESSION['firstName'];
	$lName = $_SESSION['lastName'];
	$userName = $_SESSION['userName'];
    $custId = $_SESSION['CustId'];
	$email = $_SESSION['email'];
	$subscription = $_SESSION['description'];
	$password = $_SESSION['password'];
	require_once "BriansLessonsLogin.php";
	
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	if(!$db_server)die("Unable to connect to MySql.");
	
	mysqli_select_db($db_server, $db_database)
	or die("Unable to access database.");
	
	if(!empty($_POST['firstName'])){			
		$fNameUpdate = mysqli_real_escape_string($db_server, $_POST['firstName']);
		$fNameQuery = "UPDATE Customer SET FirstName = '$fNameUpdate' WHERE  CustId = '$custId'"; 
		$result = mysqli_query($db_server, $fNameQuery);
		if(!$result){
			die ("Database Access Failed");
		} else {
			$_SESSION['firstName'] = $fNameUpdate;
			header("Location:  profile.php");
		}
	}
	if(!empty($_POST['lastName'])) {
		$lNameUpdate = mysqli_real_escape_string($db_server, $_POST['lastName']);
		$lNameQuery = "UPDATE Customer SET LastName = '$lNameUpdate' WHERE  CustId = '$custId'";
		$result = mysqli_query($db_server, $lNameQuery);
		if(!$result){
			die ("Database Access Failed");
		} else {
			$_SESSION['lastName'] = $lNameUpdate;
			header("Location:  profile.php");
		}
	}
	if(!empty($_POST['userName'])){
		$userNameUpdate = mysqli_real_escape_string($db_server, $_POST['userName']);
		$userNameQuery = "UPDATE Customer SET UserName = '$userNameUpdate' WHERE  CustId = '$custId'";
		$result = mysqli_query($db_server, $userNameQuery);
		if(!$result){
			die ("Database Access Failed");
		} else {
			$_SESSION['userName'] = $userNameUpdate;
			header("Location:  profile.php");
		}
	}
	if(!empty($_POST['email'])) {
		$emailUpdate = mysqli_real_escape_string($db_server, $_POST['email']);
		$emailQuery = "UPDATE Customer SET Email = '$emailUpdate' WHERE  CustId = '$custId'";
		$result = mysqli_query($db_server, $emailQuery);
		if(!$result){
			die ("Database Access Failed");
		} else {
			$_SESSION['email'] = $emailUpdate;
			header("Location:  profile.php");
		}
	}
	if (!empty($_POST['subscription']) && ($_POST['subscription'] == "1")){ 
		echo 3 . '<br>';
		$subscriptionId = 1;
		$query = "UPDATE Customer SET SubscriptionId = '$subscriptionId' WHERE CustId = '$custId'";
		$result = mysqli_query($db_server, $query);
		$cost = 20.00;
		$todaysDate = date_create();
		$todaysDateTime = date_format($todaysDate, "Y/m/d H:i:s");
		$invoiceQuery = "INSERT INTO Invoice (CustId, InvoiceDate, Total, SubscriptionId ) VALUES ('$custId', $todaysDateTime, $cost, $subscriptionId )";
		$invoiceResult = mysqli_query($db_server, $invoiceQuery);
		$_SESSION['video'] = "";
		if((!$result) || (!$invoiceResult)) {
			die("Database Acces Failed.");
		} else {
			$_SESSION['refund'] = "";
			if(!empty($_SESSION['total'])){
				if($cost < $_SESSION['total']){
					$_SESSION['refund'] = $_SESSION['total'] - $cost;
					$_SESSION['total'] = $cost; 
					$_SESSION['description'] = "1 Month";
					header("Location:  profile.php");
				} else {
					$_SESSION['total'] = $cost; 
					$_SESSION['description'] = "1 Month";
					header("Location:  profile.php");
				}
			}else {
					$_SESSION['total'] = $cost; 
					$_SESSION['description'] = "1 Month";
					header("Location:  profile.php");
			}	
		}
	}else if (!empty($_POST['subscription']) && ($_POST['subscription'] == "6")) {				
		echo 6 . '<br>';
		$subscriptionId = 2;
		$query = "UPDATE Customer SET SubscriptionId = '$subscriptionId' WHERE CustId = '$custId'";
		$result = mysqli_query($db_server, $query);
		$cost = 100.00;
		$todaysDate = date_create();
		$todaysDateTime = date_format($todaysDate, "Y/m/d H:i:s");
		$invoiceQuery = "INSERT INTO Invoice (CustId, InvoiceDate, Total, SubscriptionId ) VALUES ('$custId', '$todaysDateTime', '$cost', '$subscriptionId' )";
		$invoiceResult = mysqli_query($db_server, $invoiceQuery);
		$_SESSION['video'] = "";
		if((!$result) || (!$invoiceResult)) {
			die("Database Acces Failed.");
		} else {
			$_SESSION['refund'] = "";
			if(!empty($_SESSION['total'])){
				if($cost < $_SESSION['total']){
					$_SESSION['refund'] = $_SESSION['total'] - $cost;
					$_SESSION['total'] = $cost; 
					$_SESSION['description'] = "6 Months";
					header("Location:  profile.php");
				} else {
					$_SESSION['total'] = $cost; 
					$_SESSION['description'] = "6 Months";
					header("Location:  profile.php");
				}
			}else {
					$_SESSION['total'] = $cost; 
					$_SESSION['description'] = "6 Months";
					header("Location:  profile.php");
			}	
		}
	}else if (!empty($_POST['subscription']) && ($_POST['subscription'] == "12")) {
		echo 12 . '<br>';
		$subscriptionId = 3;
		$query = "UPDATE Customer SET SubscriptionId = '$subscriptionId' WHERE CustId = '$custId'";
		$result = mysqli_query($db_server, $query);
		$cost = 200.00;
		$todaysDate = date_create();
		$todaysDateTime = date_format($todaysDate, "Y/m/d H:i:s");
		$invoiceQuery = "INSERT INTO Invoice (CustId, InvoiceDate, Total, SubscriptionId ) VALUES ('$custId', '$todaysDateTime', '$cost', '$subscriptionId' )";
		$invoiceResult = mysqli_query($db_server, $invoiceQuery);
		$_SESSION['video'] = "";
		if((!$result) || (!$invoiceResult)){
			die("Database Acces Failed.");
		}else {
			$_SESSION['refund'] = "";
			if(!empty($_SESSION['total'])){
				if($cost < $_SESSION['total']){
					$_SESSION['refund'] = $_SESSION['total'] - $cost;
					$_SESSION['total'] =  $cost; 
					$_SESSION['description'] = "1 Year";
					header("Location:  profile.php");
				} else {
					$_SESSION['total'] =  $cost; 
					$_SESSION['description'] = "1 Year";
					header("Location:  profile.php");
				}
			}else {
					$_SESSION['total'] =  $cost; 
					$_SESSION['description'] = "1 Year";
					header("Location:  profile.php");
			}	
		}
	}
	if(((!empty($_POST['password'])) && (!empty($_POST['verifyPass']))) && ($_POST['password'] == $_POST['verifyPass'])){
		$options = [
			'cost' => 11,
			'salt' => openssl_random_pseudo_bytes(22, $cstrong)
		];
		$saltUpdate = $options['salt'];
		
		$passUpdate = password_hash(mysqli_real_escape_string($db_server, $_POST['password']), PASSWORD_BCRYPT, $options );
		$passQuery = "UPDATE Customer SET Password = '$passUpdate', Salt = '$saltUpdate' WHERE  CustId = '$custId'"; 
		$result = mysqli_query($db_server, $passQuery);
		if(!$result){
			die ("Database Access Failed");
		} else {
			$_SESSION['password'] = $passUpdate;
			header("Location:  profile.php");
		}
	}
	
?>
<html>
<head>
	<title>Edit Profile</title>
	<link href="Registration.css" type="text/css" rel="stylesheet">
</head>
<body>
<form method="post" action="editProfile.php">	<!--profile.php-->
	
<table class="edit">
<tr><td>Enter the Information You'd like to Change</tr></td>

	<tr>
		
		<td><input type="text" name="firstName" placeholder="First Name"></td>
	</tr>
	<tr>
		
		<td><input type="text" name="lastName" placeholder="Last Name"></td>
	</tr>
	<tr>
		
		<td><input type="text" name="userName" placeholder="UserName"></td>
	</tr>
	<tr>
		
		<td><input type="text" name="email" placeholder="Email" ></td>
	</tr>
	<div class="sub">
	<tr >
		<td>Subscription</td>
		<td>
			<h4>1 Month</h4>
			<input type="radio" name="subscription" value="1">
			
			<h4>6 Month</h4>
			<input type="radio" name="subscription" value="6">
			
			<h4>1 Year</h4>
			<input type="radio" name="subscription" value="12">
			
		</td>
	</tr>
	</div>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td>Verify Pasword</td>
		<td><input type="password" name="verifyPass"></td>
	</tr>
	<tr>
		<td><input type="submit" value="Edit"></td>
	</tr>
	<tr>
		<td><a href="Homepage.php">Home</a></td>
	</tr>
	<tr>
		<td><a href="profile.php">Profile</a></td>
	</tr>
</table>
</form>
</body>
</html>