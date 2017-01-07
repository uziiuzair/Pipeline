<?php 
// Include Sessions
include('sessions.php');
?>

<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="assets/css/style.css">
	
	</head>
	<body class="error">
	
		<?php if(!isset($_SESSION['login_user'])){ ?>
		<div class="not_logged_in">
			<p>Sorry, You're not authorized to access this page.</p>
		</div>
		<?php } else { 
			header("location: index.php");
		} ?>



	</body>
</html>