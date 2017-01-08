<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection 	= 	mysqli_connect($database_host, $database_user, $database_pass);

// Selecting Database
$db 			= 	mysqli_select_db($connection, $database_db);

// Storing Session
$user_check		=	$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User

if (mysqli_query($connection, "UPDATE users SET password = '$passwd' WHERE username='$user_check'")) {
	$passwordUpated = 'Password updated!';
} else {
	$passwordUpated = 'Password not updated';
}

?>

