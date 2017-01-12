<?php
// Initialize
require 'include/configs.php';

// Include Sessions
include('sessions.php');

// Gravatar
include 'include/pipes/gravatar.php';

// Check is a session exists
if(!isset($_SESSION['login_user'])){

	header("location: error.php");

}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<title><?php echo SITE_NAME; ?> | Dashboard</title>
		
		<link href="assets/css/style.css?" rel="stylesheet" type="text/css">

	</head>
	
	<body class="dashboard">

		<div class="header clearfix">
			
			<div class="logo clearfix">
				<div class="icon">P</div>
				<div class="name">
					<p><?php echo SITE_NAME; ?></p>
				</div>
			</div>

			<div class="navigation">
				
				<ul class="clearfix">
			
					<li>
						<a class="ico" href="#"><i class="fa fa-user"></i></a>
					</li>
			
					<li>
						<a class="ico" href="#"><i class="fa fa-user"></i></a>
					</li>
			
					<li>
						<a class="ico" href="#"><i class="fa fa-user"></i></a>
					</li>
			
					<li>
						<a href="#">
							<p>Hey, <?php echo $login_session; ?>!</p>
						</a>

						<ul>
					
							<li><a href="accountSettings.php">Account Settings</a></li>
							<li><a href="logout.php">Logout</a></li>
					
						</ul>
					
					</li>

					<li><img src="<?php echo $gravatar; ?>" class="gravatar" alt="<?php echo $login_session; ?>"></li>
			
				</ul>
			
			</div>

		</div>

		<div class="sidebar">
			<nav>
				<ul>
					<li><a href="dashboard.php"><i class="fa fa-user"></i><span>Dashboard</span></a></li>
					<li><a href="webhooks.php"><i class="fa fa-user"></i><span>Web Hooks</span></a></li>
					<li><a href="addhooks.php"><i class="fa fa-user"></i><span>End Points</span></a></li>
					<li><a href="authkeys.php"><i class="fa fa-user"></i><span>Auth Key</span></a></li>
					<li><a href="settings.php"><i class="fa fa-user"></i><span>Pipeline Settings</span></a></li>
				</ul>
			</nav>
		</div>

		<div class="container">

			<header>
				<h1>Dashboard</h1> <p><a href="dashboard.php">refresh</a></p>
			</header>
			
			<div class="blockContainer">
				
				<!-- Latest Hooks -->
				<div class="block">

					<header>
						<h2>Latest Hooks</h2>
					</header>

					<div class="content">
						
						<?php 
						if (defined('PIPES_URL')) {
						 	echo 'DEFINED';
						 	$url = PIPES_URL;
						 	echo $url;
						} else {
							echo 'NOT DEFINED';
							} ?>



					</div>

				</div>

			</div>

		</div>

	</body>

</html>