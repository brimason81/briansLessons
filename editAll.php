VIEW FOR ALL TABLES
EDIT STATEMENTS FOR ALL TABLES
<html>
<head>
	<title>Admin View/Edit</title>
	<link href="" type="text/css" rel="stylesheet">
</head>
<body>
<form method="post">
<h2>Select the Table to View/Edit</h2>
<a>employee</a>
<a>Customer</a>
<a>Subscriptions</a>
<a>Invoice</a>
<!--SHOULD BE VIEWABLE AND EDITABLE -->
<!-- MAYBE HAVE LINK FOR VIEW/EDIT???-->
<table>
	<h4>Subscription</h4>
	<tr>
		<td>SubscriptionId</td>
		<td><input type="text" name="subscriptionId"></td>
	<tr/>
	<tr>
		<td>Subscription</td>
		<td><input type="text" name="subscription"></td>
	<tr/>
	<tr>
		<td>Price</td>
		<td><input type="text" name="price"></td>
	<tr/>
	<tr>
		<td>Description</td>
		<td><input type="text area" name="desc"></td>
	<tr/>
<table/>
<!--SHOULD BE VIEWABLE AND EDITABLE -->
<table>
	<h4>Employee</h4>
	<tr>
		<td>Employee Id</td>
		<td></td>
	</tr>
	<tr>
		<td>First Name</td>
		<td><input type="text" name="firstName"></td>
	<tr/>
	<tr>
		<td>Last Name</td>
		<td><input type="text" name="lastName"></td>
	<tr/>
	<tr>
		<td>CustId</td> <!--MAYBE??? -->
		<td><input type="text" name="price"></td>
	<tr/>
<table/>
<!--SHOULD BE VIEWABLE  -->
<table>
	<h4>Invoice</h4>
	<tr>
		<td>Invoice Id</td>
		<td><input type="text" name="firstName"></td>
	<tr/>
	<tr>
		<td>Customer Id</td>
		<td><input type="text" name="lastName"></td>
	<tr/>
	<tr>
		<td>Invoice Date</td> 
		<td><input type="text" name="price"></td>
	<tr/>
	<tr>
		<td>Total</td> 
		<td><input type="text" name="price"></td>
	<tr/>
	<tr>
		<td>Subscription Id</td> 
		<td><input type="text" name="price"></td>
	<tr/>
	
<table/>
<!--SHOULD BE VIEWABLE  -->
<table>
	<h4>Customer</h4>
	<tr>
		<td>Customer Id</td>
		<td><input type="text" name="firstName"></td>
	<tr/>
	<tr>
		<td>First Name</td>
		<td><input type="text" name="lastName"></td>
	<tr/>
	<tr>
		<td>Last Name</td> 
		<td><input type="text" name="price"></td>
	<tr/>
	<tr>
		<td>UserName</td> 
		<td><input type="text" name="price"></td>
	<tr/>
	<tr>
		<td>Email</td> 
		<td><input type="text" name="price"></td>
	<tr/>
	<tr>
		<td>Subscription Id</td> 
		<td><input type="text" name="price"></td>
	<tr/>
	
<table/>
</form>
</body>
</html>