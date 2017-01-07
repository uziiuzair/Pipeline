<?php 

if (empty($database_host)) {
	$database_host = 'localhost';
} if (empty($database_user)) {
	echo "DB User cannot be empty<br>";
	echo "Set the required information in the config file <br>";
} if (empty($database_pass)) {
	echo "DB Password cannot be empty<br>";
	echo "Set the required information in the config file <br>";
} if (empty($database_db)) {
	echo "DB cannot be empty<br>";
	echo "Set the required information in the config file <br>";
}

$connection = mysqli_connect($database_host, $database_user, $database_pass);

mysqli_select_db($connection, $database_db) or die( "Unable to select database");

mysqli_close($connection);

?>