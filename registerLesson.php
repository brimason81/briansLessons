<?php session_start(); ?>
<!--
	Author:		Brian Mason
	Date:		May 2, 2018
	Section:	WEB-215(N01)
	Desc:		Form for user registration
-->
<!DOCTYPE html>
<?php
		
	//echo $_SESSION['video'];
	$error = "Your password cannot be verified.  Please try again." ;
	//$notError = "Yeeyyyyy";
	
	// connecting to the server:
	$needPass = "You must enter a valid password.";
	require_once 'BriansLessonsLogin.php';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	
	if (!$db_server) die("Unable to connect to MySql: " . mysql_error());
	
	
	if (isset($_POST["firstName"])) $fName = mysqli_real_escape_string($db_server, $_POST["firstName"]);
	if (isset($_POST["userName"])) $userName = mysqli_real_escape_string($db_server, $_POST["userName"]);
	if (isset($_POST["lastName"]))$lName = mysqli_real_escape_string($db_server, $_POST["lastName"]);
	if (isset($_POST["email"]))$email = mysqli_real_escape_string($db_server, $_POST["email"]);
		
	if ((isset($_POST["pass"])) && (isset($_POST["verifyPass"]))) {
		$password = mysqli_real_escape_string($db_server, $_POST["pass"]);
		$verifyPassword = mysqli_real_escape_string($db_server, $_POST["verifyPass"]);
		
		if (strcmp($verifyPassword, $password)!== 0) {
			echo "<h2>" . $error . "</h2>";
		} else if(($password != "") && ($verifyPassword != "")){
			//echo $notError . "<br>";
				
			//selecting the database
			mysqli_select_db($db_server, $db_database)
			or die("Unable to select database: " . mysqli_error());
	
			// query - adding the password to the database	COMBINE ALL OF THIS INTO A SINGLE 'INSERT' STATEMENT!!!!
			// http://php.net/manual/en/function.password-hash.php ---> for hashes, salts
			$options = [
				'cost' => 11,
				'salt' => openssl_random_pseudo_bytes(22, $cstrong),
			];
			$salt = $options['salt'];
			//echo $salt;
			$hash = password_hash($_POST['pass'], PASSWORD_BCRYPT, $options);	
							
			$query = "INSERT INTO customer (FirstName, LastName, UserName, Email, Password, Salt) VALUES 
			('$fName', '$lName', '$userName', '$email', '$hash', '$salt')";
			$result = mysqli_query($db_server, $query);
			if (!$result) {
				die("Database Access Failed");
			}else {
				$idQuery = "SELECT CustId FROM customer WHERE Password = '$hash'";
				$idResult = mysqli_query($db_server, $idQuery);
				if(!$idResult) {
					die("Nope");
					header("Location: registerLesson.php");
				} else {
					$idRows = mysqli_num_rows($idResult); 
					$idRow = mysqli_fetch_row($idResult);
					session_start();  
					$_SESSION['firstName'] = $fName;
					$_SESSION['lastName'] = $lName;
					$_SESSION['userName'] = $userName;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $hash;
					$_SESSION['CustId'] = $idRow[0];
					
					if (!empty($_SESSION['video'])){
						$subscriptionId = 4;
						$cost = 5.00;
						$todaysDate = date_create();
						$todaysDateTime = date_format($todaysDate, "Y/m/d H:i:s"); //this format should work!!
						
						$custId = $_SESSION['CustId'];
						$updateQuery = "UPDATE customer SET SubscriptionId = '$subscriptionId' WHERE CustId = $custId";
						$updateResult = mysqli_query($db_server, $updateQuery);
						$invoiceQuery = "INSERT INTO invoice (CustId, InvoiceDate, Total, SubscriptionId) VALUES ('$custId', '$todaysDateTime', '$cost', '$subscriptionId' )";
						$invoiceResult = mysqli_query($db_server, $invoiceQuery);
						if ((!$updateResult) || (!$invoiceResult)) {
							die("day pass fail");
						}else {
							$_SESSION['total'] = $cost;
							$_SESSION['description'] = "24 Hours - Single Video";
							header("location:  profile.php");
						}
					}else {
						header("Location:  Pricing.php");	
					}
				}
			}
			$rows =  mysqli_num_rows($result); // ---> I CHANGED LINE 49, BUT IT STILL DOESN'T LIKE IT!!
			
			for ($i = 0; $i < $rows; $i++){
				$row = mysqli_fetch_row($result);
	
				echo "First Name: " . $row[0] . '<br>';
				echo "Last Name: " . $row[1] . '<br>';
				echo "UserName: " . $row[2] . '<br>';
				echo "Email: " . $row[3] . '<br>';
				echo "Password : " . $row[4] . '<br>';
				echo "Salt: " . $row[5] . '<br>';
				
			}
		mysqli_close($db_server);
		}else echo $needPass;
	}	
	
?>
<html>
<head>
	<title>Register</title>
	<link href="Registration.css" type="text/css" rel="stylesheet" />
</head>
<body>


<form method="post" action="registerLesson.php" target="blank">
<pre>
<table><!--for formatting the form-->
<th>User Registration</th>
<tr>

	
	<td><input type="text" name="firstName" placeholder="First Name"></td>

</tr>
<tr>

	
	<td><input type="text" name="lastName" placeholder="Last Name"></td>

</tr>
<tr>

	
	<td><input type="text" name="userName" placeholder="Username"></td>

</tr>
<tr>

	
	<td><input type="text" name="email" placeholder="Email"></td>

</tr>
<tr>

	
	<td><input type="password" name="pass" placeholder="Password"></td>

</tr>
<tr>

	
	<td><input type="password" name="verifyPass" placeholder="Verify Password"></td>

</tr>


<tr>
	<td class="btn"><input type="submit" value="Sign Up"></td>
<tr class="link">
	<td id="login"><a href="loginLesson.php">Already have an Account?  Login Here!</a></td><br>
</tr>
<tr class="link">
	
		<td id="home"><a href="homepage.php">Home</a></td>
	
</tr>
	
	
</pre>
</form>
</body>
</html>

