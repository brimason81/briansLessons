<!--
	Author:  	Brian Mason
	Date:  	 	December 4, 2017
	Section: 	WEB-115(N01)
	Desc:
-->

<!DOCTYPE html>

<html>
<head>
	<title>Grooves</title>
	<link href="mainStyle.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
	
	//Variable initializing
	/*if (isset($_POST["topics"])) $chkTopic = $_POST["topics"];   
	else $chkTopic = "";
	if (isset($_POST["fName"])) $fName = $_POST["fName"];
	else $fName = "";
	if (isset($_POST["lName"])) $lName = $_POST["lName"];
	else $lName = "";	
	
	//Uses checkbox array to calculate total cost
	function TotalCost($chkTopic){								
		$boxesChecked = 0;
		$totalCost = 0;
		$costPer = 20;
		$discountCostPer = 10;
		//echo sizeof($chkTopic);  <-- for testing
		for ($i = 0; $i < sizeof($chkTopic); $i++){
			if (!empty($chkTopic[$i])){
				$boxesChecked++;
				$totalCost = $totalCost + $costPer;
				if ($boxesChecked >= 3) {
					$totalCost = $totalCost - $discountCostPer;
			}
				}
		}
	return $totalCost; 
	}
	
	//output
	$totalCost = TotalCost($chkTopic); 
	if($totalCost != 0){																
		if ($fName != "" && $lName != "" ){
			 $totalCostDisplay = "The Total Cost is $" . $totalCost . ".  Thanks for your payment, " . $fName . " " . $lName . ".  " . "Happy Drumming!!";
		}else if ($fName != "")	{
			 $totalCostDisplay = "The Total Cost is $" . $totalCost . ".  Thanks for your payment, " . $fName . ".  " . "Happy Drumming!";
		}else {
			$totalCostDisplay = "The Total Cost is $" . $totalCost . ".  " . "Happy Drumming!!";
		}
	}else{
		 $totalCostDisplay = "Please Select a Video(s)." ;
	}*/
	
	
	
	

?>
<form method="" action="Homepage.php">
	  <!--divs for styling heading image/content/etc.-->
	<div class="header">
		<div class="container">
			<div class="main">
				<!--<h1><b>Grooves</b></h1>			
				<h2>Fills bring the thrills, but grooves pay the bills <br>- Steve Gadd</h2>   -->
			</div>
		</div>
	</div>
	<div class="output">
	<?php
		echo "Enjoy!!<br>";
		echo "<br><a href=\"profile.php\">Take Me Back to My Profile</a>";
	?>
	</div>
	<div id="lessons">
		<a href="samba.MOV" >
				<img src="https://img00.deviantart.net/84e6/i/2008/272/a/8/drum_rudiments_by_brettrick.jpg" alt="hand technique">
				<div class="desc">samba</div>
			</a>
			
			
			<a href="blues.MOV" >
				<img src="http://www.authenticdrummer.com/wp-content/uploads/2013/05/Authentic-Drummer-Finger-Control.jpg">
				<div class="desc">blues</div>
			</a>
			
			
			<a href="funk.MOV">
				<img src="https://i.pinimg.com/736x/d6/07/bc/d607bc88ea4bcf81dc87f21fb25fdcd2.jpg">
				<div class="desc">funk</div>
			</a>
			
			
			<a href="reggae.MOV">
				<img src="http://www.kickstartyourdrumming.com/wp-content/uploads/2016/06/Terry-Bozzio-showing-off-1024x768.jpg">
				<div class="desc">reggae</div>
			</a>
			
			<a href="jazz.MOV">
				<img src="MainPicCropped.jpg">
				<div class="desc" >jazz</div>
			</a>
			
			
			<a href="rock.MOV">
				<img src="http://artdrum.com/IMAGES/LP/Congas/Classic-Congas-Top-Tuning-Vintage-Sunburst.jpg">
				<div class="desc">rock</div>
			</a>
		
	</div>
	

<div class="home"> 																
		<input class="btn" type="submit" value="Home">								
</div>
</form>
</body>
</html>



