<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection 	= 	mysqli_connect($database_host, $database_user, $database_pass);

// Selecting Database
$db 			= 	mysqli_select_db($connection, $database_db);

// SQL Query To Fetch Complete Information Of User

if (mysqli_query($connection, "INSERT INTO auth (id, authname, authKey) VALUES (NULL, '$authName', '$authKeyValue')")) {
	$authAdded = 'Authentication Key Added!';
} else {
	$authAdded = 'Authentication Key not Added!';
}


?>


