<?php
// Initialize
require 'include/configs.php';

// Include Sessions
include('sessions.php');
include 'include/pipes/endpointRetrieve.php';
include 'include/pipes/authRetrieve.php';

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
		
		<link href="assets/css/style.css?1" rel="stylesheet" type="text/css">

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
			
			<div class="blockContainer clearfix">
				
				<!-- Latest Hooks -->
				<div class="block dashBlocks">

					<header>
						<h2>Latest Hooks</h2>
					</header>

					<div class="content">

					</div>

				</div>

				<!-- Auth Keys -->
				<div class="block span6 dashBlocks">
					
					<header>
						<h2>Auth Keys</h2>
					</header>

					<div class="content">
						
						<?php 
						$authArraySize = sizeof($allAuths);
						$authArrayCount = 0;

						if ($authArraySize >= 5) {
							while ($authArrayCount < 5) { ?>
								<ul class="clearfix">
								<li><span><?php echo $allAuths[$authArrayCount]['authname']; ?></span></li>
								<li><input type="text" value="<?php echo $allAuths[$authArrayCount]['authKey']; ?>"></li>
							</ul>

							<?php $authArrayCount = $authArrayCount + 1;
							}
						} else {

							while ($authArrayCount < $authArraySize) { ?>
								<ul class="clearfix">
								<li><span><?php echo $allAuths[$authArrayCount]['authname']; ?></span></li>
								<li><input type="text" value="<?php echo $allAuths[$authArrayCount]['authKey']; ?>"></li>
							</ul>

							<?php $authArrayCount = $authArrayCount + 1; ?>
						<?php }
						}
						
						 ?>
					</div>
				
				</div>
				

				<!-- Webhook Endpoints -->
				<div class="block span6 dashBlocks">
					
					<header>
						<h2>End Points</h2>
					</header>

					<div class="content">
						
						<?php 
						$arraySize = sizeof($allPoints);
						$arrayCount = 0;

						if ($arraySize >= 5) {
							while ($arrayCount < 5) { ?>
								<ul class="clearfix">
									<li><span><?php echo $allPoints[$arrayCount]['name']; ?></span></li>
									<li><input type="text" value="<?php echo $allPoints[$arrayCount]['endpoint']; ?>" disabled></li>
								</ul>

								<?php $arrayCount = $arrayCount + 1;
							}
						} else {
							while ($arrayCount < $arraySize) { ?>
								<ul class="clearfix">
									<li><span><?php echo $allPoints[$arrayCount]['name']; ?></span></li>
									<li><input type="text" value="<?php echo $allPoints[$arrayCount]['endpoint']; ?>" disabled></li>
								</ul>

								<?php $arrayCount = $arrayCount + 1;
							}
						} ?>
						
						

					</div>
				
				</div>


			</div>

		</div>

	</body>

</html>