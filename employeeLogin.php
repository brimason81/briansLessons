<?php session_start();

// MYSQL - NEED TO ENTER EMPLOYEES INTO DATABASE

// PHP
/* 
	SPECIAL CONDITION FOR ADMIN 
*/
// CSS
/*
	INLINE DISPLAY FOR <A> TAGS 
	CENTERED FORM W/ BORDER.
	LIGHT-GRAY BACKGROUND
*/
require_once "BriansLessonsLogin.php";
$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
mysqli_select_db($db_server, $db_database)
or die("Unable to select database: " . mysql_error());

// ADMIN CREDENTIALS
$fNameAdmin = "Brian";
$lNameAdmin = "Mason";
$empIdAdmin = 1;

if (isset($_POST["firstName"]))$fName =  mysqli_real_escape_string($db_server,$_POST["firstName"]); else $fName = "";
if (isset($_POST["lastName"]))$lName = mysqli_real_escape_string($db_server,$_POST["lastName"]); else $lName = "";
if (isset($_POST["empId"]))$empId = mysqli_real_escape_string($db_server,$_POST["empId"]); else $empId = "";

if (($fName != "") && ($lName != "") && ($empId != "")) {
	
	$query = "SELECT EmpId, FirstName, LastName FROM Employee WHERE EmpId = '$empId'";
	$result = mysqli_query($db_server, $query);
	if (!$result) {
		die("Database Access Failed.");
	} else {
		$rows = mysqli_num_rows($result);
		$row = mysqli_fetch_row($result);
		for ($i = 0; $i < $rows; $i++){
			if ($row[0] == $empIdAdmin) {
				$_SESSION['firstName'] = "Admin"; 
				$_SESSION['lastName'] = 'Admin';
				$_SESSION['empId'] = $empId;
				$_SESSION['userName'] = "Emp";
				$_SESSION['email'] = "";
				$_SESSION['password'] = "";
				$_SESSION['CustId'] = "";	
				header("location: profile.php");
			} else {
				if (($row[0] == $empId) && ($row[1] == $fName) && ($row[2] == $lName)){				
				$_SESSION['firstName'] = $fName;
				$_SESSION['lastName'] = $lName;
				$_SESSION['empId'] = $empId;
				$_SESSION['userName'] = "Emp";
				$_SESSION['email'] = "";
				$_SESSION['password'] = "";
				$_SESSION['CustId'] = "";	
				header("location: profile.php");
			}else {
				die("Employee Login Failed.");
			}
			}
		}
	}
}
	
					
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Login</title>
	<link href="Registration.css" type="text/css" rel="stylesheet">
</head>
<body>


<form method="post" action="employeeLogin.php">
<table>
<tr>
	
	<td><input type="text" name="firstName" placeholder="First Name"></td>
</tr>
<tr>
	
	<td><input type="text" name="lastName" placeholder="Last Name"></td>
</tr>
<tr>
	
	<td><input type="text" name="empId" placeholder="Employee Id"></td>
</tr>
<tr>
	<td><input type="submit" value="Submit"></td>
</tr>
<tr class="link">
	<td><a href="Homepage.php">Home</a></td>
</tr>
</table>

</form>
</body>
</html>