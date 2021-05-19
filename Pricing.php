<!--
	Author:		Brian Mason
	Date:		April 20, 2018
	Section:	WEB-215
	Desc:  		This script assigns a subscription
				value to the appropriate customer
				in the Database.

-->
<?php 
	
	// PHP
	/*
	  SET TIME LIMIT FOR USER BASED ON SCUBSCRIPTION PG 144-145
	  ASSIGN EMPLOYEE TO EACH CUSTOMER AND DISPLAY ON PROFILE
	  VIEW INVOICE?  PROBABLY

	PHP is acting on the server. So, the function cannot be called on the client side.*/
	
	// CSS
	/*	BACKGROUND IMG - SPAN PAGE - LINEAR GRADIENT(DARK)
		INLINE RADIO BTNS IN CENTER
		INLINE BAR FOR LOGIN, HOME, LOGOUT
	*/
	require_once 'BriansLessonsLogin.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	if (!$db_server) die("Unable to connect to MySql: " . mysql_error());
	mysqli_select_db($db_server, $db_database)
	or die("Unable to select database: " . mysql_error());
	session_start();
	
	$custId = $_SESSION['CustId'];
	/* FOR TESTING
	echo  $_SESSION['CustId'] . '<br>' ;
	echo  $_SESSION['firstName'] . '<br>';
	echo  $_SESSION['lastName'] . '<br>';
	echo  $_SESSION['userName'] . '<br>' ;
	echo  $_SESSION['email'] . '<br>';
	echo $_SESSION['video'] . '<br>';*/
	$_SESSION['subscription'] = "";
	
	if (isset($_POST['subscription']) && ($_POST['subscription'] == "3")){ 
		echo 3 . '<br>';
		 // needs to be formatted
		$todaysDate = date_create();
		$todaysDateTime = date_format($todaysDate, "Y/m/d H:i:s"); //this format should work!!
		echo $todaysDateTime;
		$subscriptionId = 1;
		
		$cost = 20.00;
		
		$query = "UPDATE Customer SET SubscriptionId = '$subscriptionId' WHERE CustId = '$custId'";
		$result = mysqli_query($db_server, $query);
		// 
		$insertQuery = "INSERT INTO Invoice (CustId, InvoiceDate, Total, SubscriptionId ) VALUES ('$custId', '$todaysDateTime', '$cost', '$subscriptionId')";
		$insertResult = mysqli_query($db_server, $insertQuery);
		if((!$result) || (!$insertResult)){
			die("Database Acces Failed.");
		} else {
			$_SESSION['total'] = $cost;
			$_SESSION['description'] = "1 Month";
			header("Location:  profile.php");
		}
	}else if (isset($_POST['subscription']) && ($_POST['subscription'] == "6")) {				
		echo 6 . '<br>';
		$subscriptionId = 2;
		$todaysDate = date_create();
		$todaysDateTime = date_format($todaysDate, "Y/m/d H:i:s"); //this format should work!!
		echo $todaysDateTime;
		$cost = 100.00;
		
		$query = "UPDATE Customer SET SubscriptionId = '$subscriptionId' WHERE CustId = '$custId'";
		$result = mysqli_query($db_server, $query);
		//
		$insertQuery = "INSERT INTO Invoice (CustId, InvoiceDate, Total, SubscriptionId ) VALUES ('$custId', '$todaysDateTime', '$cost', '$subscriptionId')";
		$insertResult = mysqli_query($db_server, $insertQuery);
		if((!$result) && (!$insertResult)){
			die("Database Acces Failed.");
		} else {
			$_SESSION['total'] = $cost;
			$_SESSION['description'] = "6 Months";
			header("Location:  profile.php");
		}
	}else if (isset($_POST['subscription']) && ($_POST['subscription'] == "12")) {
		echo 12 . '<br>';
		$subscriptionId = 3;
		$todaysDate = date_create();
		$todaysDateTime = date_format($todaysDate, "Y/m/d H:i:s"); //this format should work!!
		echo $todaysDateTime;
		$cost = 200.00;
				
		$query = "UPDATE Customer SET SubscriptionId = '$subscriptionId' WHERE CustId = '$custId'";
		$result = mysqli_query($db_server, $query);
		//
		$insertQuery = "INSERT INTO Invoice (CustId, InvoiceDate, Total, SubscriptionId ) VALUES ('$custId', '$todaysDateTime', '$cost', '$subscriptionId')";
		$insertResult = mysqli_query($db_server, $insertQuery);
		if((!$result) && (!$insertResult)){
			die("Database Acces Failed.");
		} else {
			$_SESSION['description'] = "1 year";
			$_SESSION['total'] = $cost;
			header("Location:  profile.php");
		}
	} else {
		echo "<h2>Please Select a subscription option.<h2>";
	}
	echo $_SESSION['subscription'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Brian's Lessons:  Pricing</title>
		<link href="Pricing.css" type="text/css" rel="stylesheet">
	</head>
	<div class="header">
	<body>
	<form method="post" action="Pricing.php"><!-- TO PROFILE PAGE??? -->
		<div class="pricing">
			<center><p>Sign up now to have complete access to all of the lessons on the site.  
			Choose from the 3 different subscription options below.</p></center>
		</div>
		<div class="PricingOptions">
			<div class="OptionsContainer">
			<table>	<!-- Maybe not the way to go? Everything was centered w/ out the table-->
				<tr>
					<td>
					<h2>1 Month</h2>
					<h3>$20.00</h3>
					<input name="subscription"  type="radio" value="3" ></td>
				</tr>	
				<tr>
					<td><h2>6 Months</h2>
					<h3>$100.00</h3>
					<input name="subscription"  type="radio" value="6" ></td>
				</tr>
				<tr>
					<td><h2>1 Year</h2>
					<h3>$200.00</h3>
					<input name ="subscription"  type="radio" value="12" ></td>
				</tr>	<br>
				<tr>
					<td><div class="btn"><input type="submit" value="Submit"></div></tr></td>
			</table>
			
			</div>
								
			
		</div>
	</form>	
	</body>
	</div>
</html>