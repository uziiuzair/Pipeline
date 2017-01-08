<?php 

function generateApi($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function checkPassword($password) {
	if (!empty($password)) {
		
		global $database_host;
		global $database_user;
		global $database_pass;
		global $database_db;

		$connection 	= 	mysqli_connect($database_host, $database_user, $database_pass);
		$db 			= 	mysqli_select_db($connection, $database_db);
		$user_check		=	$_SESSION['login_user'];
		$ses_sql 		= 	mysqli_query($connection, "select * from users where username='$user_check'");
		$row  			= 	mysqli_fetch_assoc($ses_sql);

		$accPassword 	=	$row['password'];

		if ($password == $accPassword) {
			return true;
		} else {
			return false;
		}

	} else {
		echo 'checkPassword requires a password';
	}
}

 ?>