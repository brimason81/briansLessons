<?php
// PHP
	/*
		STOP SALT ECHO ON LOGIN Failed
	*/
	
	// CSS
	/*
		CENTER FORM, WHITE BACKGROUND
		INLINE DISPLAY FOR HOME
	*/
	
	// connecting to the database:
	require_once 'BriansLessonsLogin.php'; // do I need this again here?
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	mysqli_select_db($db_server, $db_database)
	or die("Unable to select database: " . mysql_error());
	
	if (isset($_POST["firstName"]))$fName =  mysqli_real_escape_string($db_server,$_POST["firstName"]); else $fName = "";
	if (isset($_POST["lastName"]))$lName = mysqli_real_escape_string($db_server,$_POST["lastName"]); else $lName = "";
	if (isset($_POST["pass"]))$password = mysqli_real_escape_string($db_server,$_POST["pass"]); else $password = "";
	
	
		
	if (($fName != "") && ($lName  != "") && ($password != "")) {
		
		/* Salt is random; hash is not.  Therefore, the salt must be pulled from the db in 
			a query when logging in.*/
		$saltQuery = "SELECT Salt FROM Customer WHERE FirstName = '$fName';";
		$saltResult = mysqli_query($db_server, $saltQuery);
		if (!$saltResult) die("Database Access Failed");  
		$saltRows = mysqli_num_rows($saltResult);
		$saltRow = mysqli_fetch_row($saltResult);
		//echo $saltRow[0];
		$salt = $saltRow[0];
		$options = [
			'cost' => 11,
			'salt' => $salt,
		];
		
		//echo $salt;
		$hash = password_hash($_POST['pass'], PASSWORD_BCRYPT, $options);	
		
		//
		$query = "SELECT  FirstName, LastName, UserName, Email, Password, CustId, Subscription.SubscriptionId, Subscription.Description, Price  FROM Customer JOIN Subscription ON Subscription.SubscriptionId = Customer.SubscriptionId WHERE FirstName = '$fName'";
			
		// query for validating db info
		$result = mysqli_query($db_server, $query);
		if (!$result) {
			die("Database Access Failed") . '<br>';  
			echo "Please Enter Valid Login Credentials";
		} else {
			echo "query succes";
			
		}
		// 
		$rows =  mysqli_num_rows($result); 
		
		for ($i = 0; $i < $rows; $i++){
			$row = mysqli_fetch_row($result);
				
				if (($fName == $row[0]) && ($lName == $row[1]) && ($hash == $row[4])){
					echo "Login Successful" . '<br>';
									
					session_start();
					$_SESSION['firstName'] = $fName;
					$_SESSION['lastName'] = $lName;					
					$_SESSION['password'] = $password;
					$_SESSION['userName'] = $row[2];
					$_SESSION['email'] = $row[3]; 
					$_SESSION['CustId'] = $row[5];
					$_SESSION['subscription'] = $row[6];
					$_SESSION['description'] = $row[7];
					$_SESSION['total'] = $row[8];
					
					header("Location:  profile.php");
					
				}else {
					echo "<center><h3>Login Failed.</h3></center>" ;
					echo "<center><h4>Please Try Again</h4></center>";
				}	
		}
	} else {
		echo "";//You must enter valid login info.
	}
	
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="Registration.css" type="text/css" rel="stylesheet"  />
</head>
<body>




<form method="post" action="loginLesson.php" > 
<table>
<th>User Login</th>
	<tr>
		
		<td><input type="text" name="firstName" placeholder="First Name"></td>
	</tr>
	<tr>
		
		<td><input type="text" name="lastName" placeholder="Last Name"></td>
	</tr>
	<tr>
		
		<td><input type="password" name="pass" placeholder="Password"></td>
	</tr>
	<tr>
		<td class="btn"><input type="submit" value="Submit"> </td>
	</tr>
	
	<tr class="link">
		<td id="login">	<a href="profile.php">View Profile</a></td><br>	
	</tr>
	<tr class="link">
		<td id="home"><a href="registerLesson.php">Need to create an account?  Register Here!</a></td><br>
	</tr>
	
	
	<tr class="link">
	
		<td id="home"><a href="Homepage.php">Home</a></td>
	</tr>
</table>
</form>
</body>
</html>