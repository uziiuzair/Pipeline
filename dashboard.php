<?php
// Initialize
require 'include/configs.php';

// Include Sessions
include('sessions.php');

// Check is a session exists
if(!isset($_SESSION['login_user'])){

	header("location: error.php");

}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<title><?php echo SITE_NAME; ?></title>
		
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">

	</head>
	
	<body class="dashboard">

		<!-- <div id="profile">

			<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
			<b id="logout"><a href="logout.php">Log Out</a></b>

		</div> -->


		<div class="header clearfix">
			
			<div class="logo"></div>

			<div class="navigation">
				
				<ul class="clearfix">
			
					<li>
						<a href="#"><i class="fa fa-user"></i></a>
					</li>
			
					<li>
						<a href="#"><i class="fa fa-user"></i></a>
					</li>
			
					<li>
						<a href="#"><i class="fa fa-user"></i></a>
					</li>
			
					<li>
						<a href="#">
							<p>Hey, <?php echo $login_session; ?>!</p>
						</a>

						<ul>
					
							<li><a href="">Account Settings</a></li>
							<li><a href="logout.php">Logout</a></li>
					
						</ul>
					
					</li>
			
				</ul>
			
			</div>

		</div>

	</body>

</html>