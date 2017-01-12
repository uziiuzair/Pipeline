<?php
// Initialize
require 'include/configs.php';

// Include Sessions
include('sessions.php');

// Gravatar
include 'include/pipes/gravatar.php';
include 'include/pipes/endpointRetrieve.php';

// Check is a session exists
if(!isset($_SESSION['login_user'])){

	header("location: error.php");

}

$pointAdded = '';
if(!empty($_POST['keyname'])) {

	$endPointName 	= $_POST['keyname'];
	$endPointURL 	= $_POST['keyvalue'];
		
	include 'include/pipes/addEndpoint.php';
}
?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<title><?php echo SITE_NAME; ?> | Auth Keys</title>
		
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

		<script>
			$(document).ready(function(){
				$('#addKey').click(function(){
					$('#addKeyBlock').slideToggle();
				})
			});
		</script>

	</head>
	
	<body class="dashboard auth">

		<div class="header clearfix">
			
			<div class="logo clearfix">
				<div class="icon">P</div>
				<div class="name">
					<p>Pipelines</p>
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
				<h1>End Points</h1> <p><a id="addKey" href="#">add end point</a></p>
			</header>
			
			<div class="blockContainer">

				<div id="addKeyBlock" class="block hidden block_addAuth">
					
					<header>
						<h2>Add Endpoint</h2>
					</header>

					<div class="content">
						
						<form action="" method="post">
							
							<ul class="clearfix">
							
								<li><input type="text" id="keyname" name="keyname" placeholder="Hook Name"></li>
							
								<li><input type="text" id="keyvalue" name="keyvalue" value="<?php echo PIPES_URL; ?>calls.php?c="></li>
							
								<li><button>Add Endpoint</button></li>
							
							</ul>

						</form>

					</div>
				
				</div>

				<?php 

				if ($pointAdded == '') {
					
				} else {
					echo '<p style="color:#37a628; margin-bottom:15px;">'. $pointAdded .'</p>';
				} 

				?>
				
				<!-- Latest Hooks -->
				<div class="block">

					<header>
						<h2>All Your End Points</h2>
					</header>

					<div class="content">
						
						<ul class="authInformation clearfix">
							<li>Hook Name</li>	
							<li>End Point URL</li>	
						</ul>

						<?php 
						$arraySize = sizeof($allPoints);
						$arrayCount = 0;
						
						while ($arrayCount < $arraySize) { ?>
							
							<ul class="authInformation clearfix">
								<li><span><?php echo $allPoints[$arrayCount]['name']; ?></span></li>
								<li><input type="text" value="<?php echo $allPoints[$arrayCount]['endpoint']; ?>" disabled></li>
							</ul>

							<?php $arrayCount = $arrayCount + 1; ?>
						<?php } ?>

					</div>

				</div>

			</div>

		</div>

		<script>
			$(document).ready(function() {
				$('#keyname').keyup(function(e){
					var value = '<?php echo PIPES_URL; ?>calls.php?c=' + $(this).val();
					$('#keyvalue').val(value);
				});
			});
		</script>
	</body>

</html>