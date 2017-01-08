<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection 	= 	mysqli_connect($database_host, $database_user, $database_pass);

// Selecting Database
$db 			= 	mysqli_select_db($connection, $database_db);

// SQL Query To Fetch Complete Information Of User
$ses_sql 		= 	mysqli_query($connection, "SELECT * FROM auth");
$allAuths		= 	mysqli_fetch_all($ses_sql,MYSQLI_ASSOC);

?>