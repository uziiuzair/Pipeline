<?php 

session_start(); // Starting Session

$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	
	if (empty($_POST['username']) || empty($_POST['password'])) {
	
		$error = '<span style="font-size:20px;">Username and Password cannot be empty</span>';
	
	} else {

		// Define $username and $password
		$username 	=	$_POST['username'];
		$password 	= 	$_POST['password'];
		
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = 	mysqli_connect($database_host, $database_user, $database_pass);
		
		// To protect MySQLi injection for Security purpose
		$username 	= 	stripslashes($username);
		$password 	= 	stripslashes($password);
		$username 	= 	mysqli_real_escape_string($connection, $username);
		$password 	= 	mysqli_real_escape_string($connection, $password);

		// Selecting Database
		$db 		= 	mysqli_select_db($connection, $database_db);

		// SQL query to fetch information of registerd users and finds user match.
		$query 		= 	mysqli_query($connection, "select * from users where password='$password' AND username='$username'");
		$rows 		= 	mysqli_num_rows($query);
	
		if ($rows == 1) {

			$_SESSION['login_user'] 	= 	$username; // Initializing Session

			header("location: dashboard.php"); // Redirecting To Other Page

		} else {
		
			$error = '<span style="font-size:20px;">You went wrong somewhere!</span>';
		
		}

		mysqli_close($connection); // Closing Connection
	}
}

?>