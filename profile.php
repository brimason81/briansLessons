<?php session_start(); 
	
?>
<!--
	Author:		Brian Mason	
	Date:		May 5, 2018
	Section:	WEB-215(N01)
	Desc:		This page displays a user's 
				account information
-->
<!DOCTYPE html>

	

<html>	
<head>
	<title>Profile</title>
	<link href="Registration.css" type="text/css" rel="stylesheet">
	
</head>
<body>
<form>
<table>
	<?php
	$adminId = 1;
	
	
	if (!empty($_SESSION['empId']))	{
		if ($_SESSION['empId'] == $adminId){
			echo "<h2>Welcome, Admin.</h2>";
			echo "<p>To edit/view database info, Click <a href=\"editAllView.php\">Here</a></p>";
			
		} else {
			echo "<h2>Welcome, " . $_SESSION['firstName'] . "</h2>";
			echo "<h3>Employee Id " . $_SESSION['empId'] . "</h3>";
			echo "<p>To view database info, Click <a href=\"editAllView.php\">Here</a></p>";
				
		}
	} else {
			if(!empty($_SESSION['video'])) {
				echo "<h2>Happy Drumming!</h2>";
				if ($_SESSION['video'] == 'samba') {
					echo "<h3>To View Video, Click <a href=\"samba.MOV\">Here</a></h3>";
				}else if($_SESSION['video'] == 'jazz') {
					echo "<h3>To View Video, Click <a href=\"jazz.MOV\">Here</a></h3>";
				}else if($_SESSION['video'] == 'rock') {
					echo "<h3>To View Video, Click <a href=\"rock.MOV\">Here</a></h3>";
				}else if($_SESSION['video'] == 'reggae') {
					echo "<h3>To View Video, Click <a href=\"reggae.MOV\">Here</a></h3>";
				}else if($_SESSION['video'] == 'blues') {
					echo "<h3>To View Video, Click <a href=\"blues.MOV\">Here</a></h3>";
				}else if($_SESSION['video'] == 'funk') {
					echo "<h3>To View Video, Click <a href=\"funk.MOV\">Here</a></h3>";
				}						
				echo "<p>You have successfully registered/Logged in, " . $_SESSION['firstName'] . "</p>";
				echo "<p>To edit your account information, click <a href=\"editProfile.php\">here</a></p><br>";
				//echo "<a href=\"Homepage.php\">Home</a><br>";
				//echo "<a href=\"LogoutLessons.php\">Log Out</a>";	
			} else if (!empty($_SESSION)){
				echo "<h2>Happy Drumming!</h2>";
				echo "<h3>To View Videos, Click <a href=\"Grooves.php\">Here</a></h3>";
				echo "<p>You have successfully registered/Logged in, " . $_SESSION['firstName'] . "</p>";
				echo "<p>To edit your account information, click <a href=\"editProfile.php\">here</a></p><br>";
				//echo "<a href=\"Homepage.php\">Home</a><br>";
				//echo "<a href=\"LogoutLessons.php\">Log Out</a>";	
			} else {
				echo "<h2>Please Register or Login!</h2><br>";
				echo "<tr><td><a href=\"loginLesson.php\">Login!</a></td></tr>";
				echo "<tr><td><a href=\"employeeLogin.php\">Employee Login</a></td></tr>";
				echo "<tr><td><a href=\"Homepage.php\">Home</a></td></tr>";
			}
		}

	?>
	
	

	<th>User Profile</th>
	<tr>
		<td>First Name</td>
		<td>
			<?php if(!empty($_SESSION['firstName'])) {
					echo $_SESSION['firstName'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td>
			<?php if(!empty($_SESSION['lastName'])) {
					echo $_SESSION['lastName'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	<tr>
		<td>UserName</td>
		<td>
			<?php if(!empty($_SESSION['userName'])) {
					echo $_SESSION['userName'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>
			<?php if(!empty($_SESSION['email'])) {
					echo $_SESSION['email'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	<tr>
		<td>Customer ID</td>
		<td>
			<?php if(!empty($_SESSION['CustId'])) {
					echo $_SESSION['CustId'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	<tr>
		<td>Subscription</td>
		<td>
			<?php if(!empty($_SESSION['description'])) {
					echo $_SESSION['description'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	
	<tr>
		
		<td>
			<?php if(!empty($_SESSION['total'])) {
					echo "The cost of your subscription is " . '$'. $_SESSION['total'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	
	<tr>
		
		<td>
			<?php if(!empty($_SESSION['refund'])) {
					echo "Refund due in the amount of " . '$' . $_SESSION['refund'];
				  } else {
					  echo "";
				  } 	
			?>	
		</td>
	</tr>
	
	<tr>
		<td>
			<?php
				if((!empty($_SESSION['CustId'])) || (!empty($_SESSION['empId']))){
					echo "<div class=\"alink\"><a href=\"LogoutLessons.php\">Log Out</a><div>";	
				}
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php
				if((!empty($_SESSION['CustId'])) || (!empty($_SESSION['empId']))){
					echo "<div class=\"alink\"><a href=\"Homepage.php\">Home</a><div>";	
				}
			?>
		</td>
	</tr>
</table>
</form>
</body>
</html>