<?php 
// The Pipeline by uziiuzair.
// uziiuzair.com (c) 2016

// Initialize
require 'include/configs.php';

// Include Login Script
include 'login.php';

// Check is a session exists
if(isset($_SESSION['login_user'])){

	header("location: dashboard.php");

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
	
		<div class="logo">
			<title><?php echo SITE_NAME; ?></title>	
		</div>
		
		
		<link href="assets/css/style.css?v=0.0.1" rel="stylesheet" type="text/css">
	
	</head>
	<body class="login">

		<div class="overlay">

			<div class="main">
				
				<h1>P</h1>	
				
				<div class="loginForm">

					<?php if (!empty($error)) { ?>
						<h2><?php echo $error; ?></h2>
					<?php } else { ?>
						<h2>Hey there!</h2>
					<?php } ?>
					
					<form action="" method="post">
						

						<div class="inputContainer">
							<input id="name" name="username" placeholder="Username" type="text">	
							<i class="fa fa-user-o"></i>
						</div>
						
						<div class="inputContainer">
							<input id="password" name="password" placeholder="Password" type="password">
							<i class="fa fa-lock"></i>
						</div>
						
						<input <?php if(!empty($error)) { ?> style="background:#b44343;" <?php } ?> name="submit" type="submit" value="Log in">
						
						
					
					</form>
				
				</div>

			</div>
		
		</div>

	</body>
</html>