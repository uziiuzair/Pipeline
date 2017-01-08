<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection 	= 	mysqli_connect($database_host, $database_user, $database_pass);

// Selecting Database
$db 			= 	mysqli_select_db($connection, $database_db);

// Storing Session
$user_check		=	$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql 		= 	mysqli_query($connection, "select * from users where username='$user_check'");
$row  			= 	mysqli_fetch_assoc($ses_sql);

$accUsername 	=	$row['username'];
$accEmail 		=	$row['email'];
$accName 		=	$row['fullname'];
$accRole		=	$row['admin'];

?>