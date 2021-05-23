<?php session_start(); ?>
<!--
	Author:		Brian Mason	
	Date: 		May 5, 2018
	Section:	WEB-215(N01)
	Desc:		This page is for employees to view 
				database info, and provides the admin 
				a link to adminEdit page.
-->
<?php
	ob_start();
	$admin = 1;
	// Accessing server
	require_once "BriansLessonsLogin.php";
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
	if (!$db_server) die("Database Access Failed");
	
	// selecting/querying db
	mysqli_select_db($db_server, $db_database);
	// Query
	$queryEmp = "SELECT * FROM Employee";
	$resultEmp = mysqli_query($db_server, $queryEmp);
	if(!$resultEmp) {
		die("Employee Query Failed");
	}
	// Query
	$queryCust = "SELECT * FROM Customer";
	$resultCust = mysqli_query($db_server, $queryCust);
	if(!$resultCust){
		die("Customer Query Failed");
	}
	// Query
	$querySub = "SELECT * FROM Subscription";
	$resultSub = mysqli_query($db_server, $querySub);
	if(!$resultSub){
		die("Subscription Query Failed");
	}
	// Query
	$queryInvoice = "SELECT * FROM Invoice LIMIT 10";
	$resultInvoice = mysqli_query($db_server, $queryInvoice);
	if(!$resultInvoice){
		die("Invoice Query Failed");
	}
	function addEmp(){
		$_SESSION['editEmp'] = 'add';
		echo("<script>location.href= 'adminEdit.php';</script>");	

		//header("location:  adminEdit.php");
	}
	function updateEmp() {
		$_SESSION['editEmp'] = 'update';
		echo("<script>location.href= 'adminEdit.php';</script>");	

		//header("location:  adminEdit.php");
	}
	function removeEmp() {
		$_SESSION['editEmp'] = 'remove';
		echo("<script>location.href= 'adminEdit.php';</script>");	

		//header("location:  adminEdit.php");
	}
	function addSub(){
		$_SESSION['editSub'] = 'add';
		echo("<script>location.href= 'adminEdit.php';</script>");	

		//header("location:  adminEdit.php");
	}
	function updateSub() {
		$_SESSION['editSub'] = 'update';
		// TEST
		/*if (headers_sent()) {
			die('redirect failed.');
		} else {
			header("location:  adminEdit.php");
		}
		*/
		echo("<script>location.href= 'adminEdit.php';</script>");	
			
	}
	function removeSub() {
		$_SESSION['editSub'] = 'remove';
		header("location:  adminEdit.php");
	}
	if(isset($_GET['editSub'])) {
		if($_GET['editSub'] == 'add'){
			addSub();
		} else if($_GET['editSub'] == 'update'){
			updateSub();
		} else if($_GET['editSub'] == 'remove'){
			removeSub();
		} 
	}
	if(isset($_GET['editEmp'])) {
		if($_GET['editEmp'] == 'add'){
			addEmp();
		} else if($_GET['editEmp'] == 'update'){
			updateEmp();
		} else if($_GET['editEmp'] == 'remove'){
			removeEmp();
		} 
	}
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin View/Edit</title>
	<link href="" type="text/css" rel="stylesheet">
</head>
<body>
<form method="post">
<h2>Select the Table to View/Edit</h2>

<!--SHOULD BE VIEWABLE AND EDITABLE -->
<!-- MAYBE HAVE LINK FOR VIEW/EDIT???-->
<table width="600" border="1" cellpadding="1" cellspacing="1">
<h4>Subscription</h4>
	<tr>
		<th>Subscription Id</th> 
		<th>Subscription</th>
		<th>Price</th> 
		<th>Description</th> 
	</tr>
	<?php
	while($subscription = mysqli_fetch_assoc($resultSub)){
		echo "<tr>";
			echo "<td>" . $subscription['SubscriptionId'] ."</td>";
			echo "<td>" . $subscription['Subscription'] ."</td>";
			echo "<td>" . $subscription['Price'] ."</td>";
			echo "<td>" . $subscription['Description'] ."</td>";
		echo "</tr>";
	}
	
	if($_SESSION['empId'] == $admin){
		echo "<a href=\"editAllView.php?editSub=update\">Update<a><br>";
		echo "<a href=\"editAllView.php?editSub=add\">Add<a><br>";
		echo "<a href=\"editAllView.php?editSub=remove\">Delete<a>";
	}
	?>	
</table>
<!--SHOULD BE VIEWABLE AND EDITABLE -->
<h4>Employee</h4>
<table width="600" border="1" cellpadding="1" cellspacing="1">
	
	<tr>
		<th>Employee Id</th>
		
		<th>First Name</th>
		
		<th>Last Name</th>
		
		<th>Customer Id</th>
		
	</tr>
	<?php
	while ($employee=mysqli_fetch_assoc($resultEmp)){
		echo "<tr>";
			echo "<td>" . $employee['EmpId'] ."</td>";
			echo "<td>" . $employee['FirstName'] ."</td>";
			echo "<td>" . $employee['LastName'] ."</td>";
			echo "<td>" . $employee['CustId'] ."</td>";
		echo "</tr>";
	}
	
	if($_SESSION['empId'] == $admin){
		echo "<a href=\"editAllView.php?editEmp=update\">Update<a><br>";
		echo "<a href=\"editAllView.php?editEmp=add\">Add<a><br>";
		echo "<a href=\"editAllView.php?editEmp=remove\">Delete<a>";
	}
	?>
</table>
<!--SHOULD BE VIEWABLE  -->
<h4>Invoice</h4>
<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th>Invoice Id</th>
		<th>Customer Id</th>
		<th>InvoiceDate</th> 
		<th>Total</th> 
		<th>Subscription Id</th> 
	</tr>
	<?php
	while($invoice = mysqli_fetch_assoc($resultInvoice)){
		echo "<tr>";
			echo "<td>" . $invoice['InvoiceId'] ."</td>";
			echo "<td>" . $invoice['CustId'] ."</td>";
			echo "<td>" . $invoice['InvoiceDate'] ."</td>";
			echo "<td>" . $invoice['Total'] ."</td>";
			echo "<td>" . $invoice['SubscriptionId'] ."</td>";
		echo "</tr>";
	}
	?>
	
</table>
<!--SHOULD BE VIEWABLE  -->
<h4>Customer</h4>
<table width="600" border="1" cellpadding="1" cellspacing="1">
	
	<tr>
		<th>Customer Id</th>
		<th>First Name</th>
		<th>Last Name</th> 
		<th>UserName</th> 
		<th>Email</th> 
		<th>Subscription Id</th> 
	</tr>
	<?php
	while($customer = mysqli_fetch_assoc($resultCust)){
		echo "<tr>";
			echo "<td>" . $customer['CustId'] ."</td>";
			echo "<td>" . $customer['FirstName'] ."</td>";
			echo "<td>" . $customer['LastName'] ."</td>";
			echo "<td>" . $customer['UserName'] ."</td>";
			echo "<td>" . $customer['Email'] ."</td>";
			echo "<td>" . $customer['SubscriptionId'] ."</td>";
		echo "</tr>";
	}
	?>
</table>
<a href="Homepage.php">Home</a><br>
<a href="profile.php">Profile</a>
</form>
</body>
</html>