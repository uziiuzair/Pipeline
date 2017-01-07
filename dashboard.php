<?php
// Initialize
require 'include/configs.php';

// Include Sessions
include('sessions.php');

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<title><?php echo SITE_NAME; ?></title>
		
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">

	</head>
	
	<body>

		<div id="profile">

			<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
			<b id="logout"><a href="logout.php">Log Out</a></b>

		</div>

	<?php 
	echo $user_check;
	print_r(array_values($row));
	?>

	</body>

</html>