	<!--
	Author:		Brian Mason
	Date: 		May 5, 2018	
	Section: 	WEB - 215(N01)
	Desc:		script for online lesson homepage

	
-->
<!--
	// PHP
	EMPLOYEE LOGIN - ADMIN ACCOUNT THAT CAN EDIT ALL TABLES.
	FORMAT TIME() TO DATETIME
	PAGE FOR EDITING TABLES
	TOTAL DISPLAY - TOTAL CALCULATION
	FIX SUBSCRIPTION ON PROFILE PG
	DISPLAY SUBSCRIPTION LENGTH
	
	// CSS
	INLINE DISPLAY FOR LOGIN, REGISTER, PROFILE, LOGOUT
-->
<!DOCTYPE html>
<?php session_start(); 

	//echo $_SESSION['video'];
	function samba(){
		$_SESSION['video'] = 'samba';
		header("location:  registerLesson.php");
	}
	function blues(){
		$_SESSION['video'] = 'blues';
		header("location:  registerLesson.php");
	}
	function jazz(){
		$_SESSION['video'] = 'jazz';
		header("location:  registerLesson.php");
	}
	function rock(){
		$_SESSION['video'] = 'rock';
		header("location:  registerLesson.php");
	}
	function reggae(){
		$_SESSION['video'] = 'reggae';
		header("location:  registerLesson.php");
	}
	function funk(){
		$_SESSION['video'] = 'funk';
		header("location:  registerLesson.php");
	}
	if(isset($_GET['video'])) {
		if($_GET['video'] == 'samba'){
			samba();
		} else if($_GET['video'] == 'blues'){
			blues();
		} else if($_GET['video'] == 'rock'){
			rock();
		} else if($_GET['video'] == 'funk'){
			funk();
		} else if($_GET['video'] == 'reggae'){
			reggae();
		} else if($_GET['video'] == 'jazz'){
			jazz();
		}
	}
?>
<html>
<head>
	<title>Brian's Online Drum Lessons</title>
	<!---->
		<link href="Homepage.css" type="text/css" rel="stylesheet"/>

</head>

<body>
    <!--divs for styling heading image/content/etc.-->
	<div class="naviagation">
	<ul class="nav" >
		<?php
		if(empty($_SESSION)){
			echo "<li><a href=\"employeeLogin.php\">Employee Login</a></li>";
			echo "<li><a href=\"loginLesson.php\">Login</a></li>";
			echo "<li><a href=\"registerLesson.php\">Don't have an account?  Register Here</a></li>";
		
		} else if (!empty($_SESSION)) {
			echo "<li><a href=\"LogoutLessons.php\">Log Out</a></li>"; 
			echo "<li><a href=\"profile.php\">View Profile</a></li>";
		}
		?>
	</ul>
	</div>
	<div class="header">
		<div class="container">
			<div class="main">
				<h1><b>Brian's Online Drum Lessons</b></h1>			
				<h2>Drum Lessons for every level of player</h2>
			</div>
		</div>
	</div>
	<!--<div class="enter">
		<a href="#" class="btn">Enter</a>
	</div>-->
	
	<center><div class="center">
	At Brian's online lessons, there are lessons to accomodate every level of player.  From basic technique to advanced polyrhythms, we have lessons to meet your needs.
	</div> </center>
	
	<!--<form method="post" action="loginLesson.php" > MAYBE CHANGE TO VIDEOS PAGE
		<input class="btn" type="submit" value="Login">	   <br>    <br>
	</form> -->
	
	<h3>Featured Lessons:</h3>
	<div id="back">
		<div id="lessons">
			<!--These will be the links to the lesson pages. for the 'bio' page, don't go to the form-->
			<form method="" action="Registration.php">
			<div class="polaroid">
			<a href="Homepage.php?video=samba" >
				<img src="https://img00.deviantart.net/84e6/i/2008/272/a/8/drum_rudiments_by_brettrick.jpg" alt="hand technique">
				<div class="desc">samba</div>
			</a>
			
			
			<a href="Homepage.php?video=blues" >
				<img src="http://www.authenticdrummer.com/wp-content/uploads/2013/05/Authentic-Drummer-Finger-Control.jpg">
				<div class="desc">blues</div>
			</a>
			
			
			<a href="Homepage.php?video=funk">
				<img src="https://i.pinimg.com/736x/d6/07/bc/d607bc88ea4bcf81dc87f21fb25fdcd2.jpg">
				<div class="desc">funk</div>
			</a>
			
			
			<a href="Homepage.php?video=reggae">
				<img src="http://www.kickstartyourdrumming.com/wp-content/uploads/2016/06/Terry-Bozzio-showing-off-1024x768.jpg">
				<div class="desc">reggae</div>
			</a>
			
			<a href="Homepage.php?video=jazz">
				<img src="MainPicCropped.jpg">
				<div class="desc" >jazz</div>
			</a>
			
			
			<a href="Homepage.php?video=rock">
				<img src="http://artdrum.com/IMAGES/LP/Congas/Classic-Congas-Top-Tuning-Vintage-Sunburst.jpg">
				<div class="desc">rock</div>
			</a>
			</div>
			
			</form>
		</div>
	</div>
	<!--
	<div class="subscribe">
		<a href="#" class="btn">Subscribe</a>
	</div>-->


</body>


	
</html>