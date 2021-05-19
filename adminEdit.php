<!--
	Author:		Brian Mason
	Date:		May 5, 2018
	Section:	WEB-215(N01)
	Desc:		This page is for the administrator
				to edit database info
-->
<!DOCTYPE html> 
<?php
	session_start();
	require_once "BriansLessonsLogin.php";
	
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	if(!$db_server)die("Unable to connect to MySql.");
	
	mysqli_select_db($db_server, $db_database)
	or die("Unable to access database.");
	
	
	
?>
<html>
<head>
	<link >
	<title>Admin Edit</title>
</head>
<body>
<form method="post" action="adminEdit.php">
<table>

<?php


	if(!empty($_SESSION['editSub'])){
		echo "<p>Subscription Edit</p>";
		if ($_SESSION['editSub'] == 'remove') {
			echo "<tr><td>Enter the Subscription Id to be Deleted</td></tr>";
			echo "<tr><td><input type=\"text\" name=\"subId\" placeholder=\"Subscription Id\"></td></tr>";
			echo "<tr><td><input type=\"submit\" value=\"Delete\"></td></tr>";
			if (!empty($_POST['subId'])){
				$subId = $_POST['subId'];
				$deleteQuery = "DELETE FROM Subscription WHERE SubscriptionId = '$subId'";
				$deleteResult = mysqli_query($db_server, $deleteQuery);
				if(!$deleteResult){
					die("Subscription Delete Failed");
				}else {
					$_SESSION['editSub'] = "";
					header("location:  editAllView.php");
				}
			}
		} else if ($_SESSION['editSub'] == 'update'){
			echo "<tr><td>Enter Subscription Info to be Updated</td></tr>";
			echo "<tr><td><input type=\"text\" name=\"subId\" placeholder=\"Subscription Id\"></td></tr>";
			echo "<tr><td><input type=\"text\" name=\"subscription\" placeholder=\"Subscription\"></td></tr>";
			echo "<tr><td><input type=\"text\" name=\"price\" placeholder=\"Price\" ></td></tr>";
			echo "<tr><td><input type=\"text\" name=\"desc\" placeholder=\"Description\"></td></tr>";
			echo "<tr><td><input type=\"submit\" value=\"Update\"></td></tr>";
			if(!empty($_POST['subId']))	{
				$subId = $_POST['subId'];
				if (!empty($_POST['price'])) {
					$priceUpdate = $_POST['price'];
					$updateQuery = "UPDATE Subscription SET Price = '$priceUpdate' WHERE SubscriptionId = '$subId'";
					$updateResult = mysqli_query($db_server, $updateQuery);
					if(!$updateResult) {
						die("Subscription Price Update Failed");
					}else {
						header("location:  editAllView.php");
					}
				}
				if (!empty($_POST['subscription'])) {
					$subUpdate = $_POST['subscription'];
					$updateQuery = "UPDATE Subscription SET Subscription = '$subUpdate' WHERE SubscriptionId = '$subId'";
					$updateResult = mysqli_query($db_server, $updateQuery);
					if(!$updateResult) {
						die("Subscription subscription Update Failed");
					}else {
						header("location:  editAllView.php");
					}
				}
				if (!empty($_POST['desc'])) {
					$descUpdate = $_POST['desc'];
					$updateQuery = "UPDATE Subscription SET Description = '$descUpdate' WHERE SubscriptionId = '$subId'";
					$updateResult = mysqli_query($db_server, $updateQuery);
					if(!$updateResult) {
						die("Subscription Description Update Failed");
					}else {
						header("location:  editAllView.php");
					}
				}
			}	
		} else if ($_SESSION['editSub'] == 'add'){
			echo "<tr><td>Enter Subscription Added</td></tr>";
			echo "<tr><td><input type=\"text\" name=\"subscription\" placeholder=\"Subscription\"></td></tr>";
			echo "<tr><td><input type=\"text\" name=\"price\" placeholder=\"Price\"></td></tr>";
			echo "<tr><td><input type=\"text\"  name=\"desc\"  placeholder=\"Description\"></td></tr>";
			echo "<tr><td><input type=\"submit\" value=\"Add\"></td></tr>";
			if(!empty($_POST['subscription']) && (!empty($_POST['price'])) && (!empty($_POST['desc']))) {
				$sub = $_POST['subscription'];
				$price = $_POST['price'];
				$desc = $_POST['desc'];
				$insertQuery = "INSERT INTO Subscription (Subscription, Price, Description) VALUES ('$sub', '$price', '$desc')";
				$insertResult = mysqli_query($db_server, $insertQuery);
				if(!$insertQuery){
					die("Subscription Add Failed");
				}else {
					header("location:  editAllView.php");
				}
			}
		}
	}
	
		
?>

</table>

<table>


<?php
	if(!empty($_SESSION['editEmp'])) {
		"<p>Employee Edit</p>";
		if ($_SESSION['editEmp'] == 'remove') {
			echo "<tr><td>Enter the Employee Id to be Deleted</td></tr>";
			echo "<tr><td><input type=\"text\" name=\"empId\" placeholder=\"Employee Id\"></td></tr>";
			echo "<tr><td><input type=\"submit\" value=\"Delete\"></td></tr>";
			if (!empty($_POST['empId'])){
				$empId = $_POST['empId'];
				$deleteQuery = "DELETE FROM Employee WHERE EmpId = '$empId'";
				$deleteResult = mysqli_query($db_server, $deleteQuery);
				if(!$deleteResult){
					die("Employee Delete Failed");
				}else {
					header("location:  editAllView.php");
				}
			}
		} else if ($_SESSION['editEmp'] == 'update'){
			echo "<tr><td>Enter Employee Info to be Updated</td></tr>";
			echo "<tr><td><input type=\"text\" name=\"empId\" placeholder=\"Employee Id\"></td></tr>";
			echo "<tr><td><input type=\"text\" name=\"empFirstName\" placeholder=\"First Name\"></td></tr>";
			echo "<tr><td><input type=\"text\" name=\"empLastName\" placeholder=\"Last Name\" ></td></tr>";
			echo "<tr><td><input type=\"submit\" value=\"Update\"></td></tr>";
			if(!empty($_POST['empId']))	{
				$empId = $_POST['empId'];
				if (!empty($_POST['empFirstName'])) {
					$fNameUpdate = $_POST['empFirstName'];
					$updateQuery = "UPDATE Employee SET FirstName = '$fNameUpdate' WHERE EmpId = '$empId'";
					$updateResult = mysqli_query($db_server, $updateQuery);
					if(!$updateResult) {
						die("Employee First Name Update Failed");
					}else {
						header("location:  editAllView.php");
					}
				}
				if (!empty($_POST['empLastName'])) {
					$lNameUpdate = $_POST['empLastName'];
					$updateQuery = "UPDATE Employee SET LastName = '$lNameUpdate' WHERE EmpId = '$empId'";
					$updateResult = mysqli_query($db_server, $updateQuery);
					if(!$updateResult) {
						die("Employee Last Name Update Failed");
					}else {
						header("location:  editAllView.php");
					}
				}
			}	
		} else if ($_SESSION['editEmp'] == 'add'){
			echo "<tr><td>Enter Employee Added</td></tr>";
			echo "<tr><td><input type=\"text\" name=\"empFirstName\" placeholder=\"First Name\"></td><tr>";
			echo "<tr><td><input type=\"text\" name=\"empLastName\" placeholder=\"Last Name\"></td></tr>";
			echo "<tr><td><input type=\"submit\" value=\"Add\"></td></tr>";
			if(!empty($_POST['empFirstName']) && (!empty($_POST['empLastName']))) {
				$fName = $_POST['empFirstName'];
				$lName = $_POST['empLastName'];
				$insertQuery = "INSERT INTO Employee (FirstName, LastName) VALUES ('$fName', '$lName')";
				$insertResult = mysqli_query($db_server, $insertQuery);
				if(!$insertQuery){
					die("Employee Add Failed");
				}else {
					header("location:  editAllView.php");
				}
			}
		}
	}
?>

</table>
</form>
</body>
</html>