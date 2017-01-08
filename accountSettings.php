<?php
// Initialize
require 'include/configs.php';

// Include Sessions
include('sessions.php');

// Gravatar
include 'include/pipes/gravatar.php';
include 'include/pipes/getAccountInformation.php';
include 'include/pipes/listAllAccounts.php';

// Check is a session exists
if(!isset($_SESSION['login_user'])){

	header("location: error.php");

}

$passwordUpated = '';
$passError  = false;
if(!empty($_POST['passwd'])) {

	$passwd 	= $_POST['passwd'];
	$passwdRent = $_POST['passwdRent'];

	if ($passwd == $passwdRent) {
		include 'include/pipes/updatePassword.php';
	} else {
		$passError = true;
	}

}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<title><?php echo SITE_NAME; ?></title>
		
		<link href="assets/css/style.css?1" rel="stylesheet" type="text/css">

	</head>
	
	<body class="dashboard accountSettings">

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
					<li><a href=""><i class="fa fa-user"></i><span>Web Hooks</span></a></li>
					<li><a href=""><i class="fa fa-user"></i><span>Add Web Hook</span></a></li>
				</ul>
			</nav>
		</div>

		<div class="container">

			<header>
				<h1>Account Settings</h1> </p>
			</header>
			
			<div class="blockContainer">
				
				<!-- Your Profile -->
				<div class="block profile">
	
					<header>
						<h2>Your Profile</h2>
					</header>

					<div class="content">
						
						
						<label for="name">Full Name</label>
						<input type="text" name="fullname" id="name" value="<?php echo $accName; ?>">
						
						<label for="username">User Name</label>
						<input type="text" name="username" id="username" value="<?php echo $accUsername; ?>">

						<label for="email">E-Mail</label>
						<input type="text" name="email" id="email" value="<?php echo $accEmail; ?>">
						
						<label for="">Gravatar</label>
						<img src="<?php echo $gravatar; ?>" class="gravatar" alt="<?php echo $login_session; ?>">
						<p style="color:#adaeb0; font-size: 13px; margin-top: 10px;">you can change your gravatar at <a style="color:#007eff;text-decoration: none;" href="http://gravatar.com">gravatar.com</a></p>

						<hr>

						<form action="" method="post">
							<label for="passwd">Change Password</label>

							<?php 

							if ($passError == true) {
								echo '<p style="color:#b44343; margin-bottom:15px;">Password do not match!</p>';
							}

							if ($passwordUpated == '') {
								
							} else {
								echo '<p style="color:#37a628; margin-bottom:15px;">' . $passwordUpated . '</p>';
							}
							
							?>

							<input type="password" name="passwd" id="passwd" placeholder="Enter Password">
							<input type="password" name="passwdRent" id="passwdRent" placeholder="Re-Enter Password">

							<button>Submit</button>
						</form>

					</div>

				</div>

				<?php if ($accRole == 1): ?>
					
					<div class="block users">
						
						<header>
							<h2>Users</h2>
						</header>
						
						<div class="content">
							<ul class="userInformation clearfix">
								<li>ID</li>
								<li>Username</li>
								<li>Email</li>
								<li>Full Name</li>
							</ul>
						
							<?php 
							$arraySize = sizeof($allAccs);
							$arrayCount = 0;
							
							while ($arrayCount < $arraySize) { ?>
								
								<ul class="userInformation clearfix">
									<li><?php echo $allAccs[$arrayCount]['id']; ?></li>
									<li><?php echo $allAccs[$arrayCount]['username']; ?></li>
									<li><?php echo $allAccs[$arrayCount]['email']; ?></li>
									<li><?php echo $allAccs[$arrayCount]['fullname']; ?></li>
								</ul>

								<?php $arrayCount = $arrayCount + 1; ?>
							<?php } ?>
						</div>

					</div>

				<?php endif ?>

			</div>

		</div>

	</body>

</html>