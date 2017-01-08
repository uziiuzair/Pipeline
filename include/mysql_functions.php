<?php 

// Define the Task and Table you would like to get infomation from.
// In this case, Task represents the data. And not a method.
function db_connect($value, $field, $table, $method) {
	
	global $database_host;
	global $database_user;
	global $database_pass;
	global $database_db;

	// Connect to MySQL
	$connection = mysqli_connect($database_host, $database_user, $database_pass);

	// Get Database
	mysqli_select_db($connection, $database_db) or die( "Unable to select database");

	// Check if all values exist
	if (empty($value)) {
		echo 'db_connect requires a value';
	} elseif (empty($field)) {
		echo 'db_connect requires a field name';
	} elseif (empty($table)) {
		echo 'db_connect requires a table name';
	}

	// Check Method
	if ($method == 'get') {
		// Set GET SQL script
		$sql = "SELECT $field FROM $table";
	} elseif ($method == 'insert') {
		// INSERT SQL Script
		$sql = "INSERT INTO $table ( $field ) VALUES ( $value  )";
	}
	
	$result = $connection->query($sql);
	
	mysqli_close($connection);

}

function db_insert($table,$value,$field) {

	global $database_host;
	global $database_user;
	global $database_pass;
	global $database_db;

	$connection = mysqli_connect($database_host, $database_user, $database_pass);

	mysqli_select_db($connection, $database_db) or die( "Unable to select database");

	$sql = "INSERT INTO $table ( $field ) VALUES ( $value )";

	$result = $connection->query($sql);

	mysqli_close($connection);

	return $sql;


}

function db_get($table, $field) {

	global $database_host;
	global $database_user;
	global $database_pass;
	global $database_db;

	$connection = mysqli_connect($database_host, $database_user, $database_pass);

	//mysqli_select_db($connection, $database_db) or die( "Unable to select database");

	if (!$connection) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT option_id, option_name, option_value FROM options";

	$result = $connection->query($sql);

	    while($row = mysqli_fetch_assoc($result)) {
	        echo "id: " . $row["option_id"]. " - Name: " . $row["option_name"]. " " . $row["option_value"]. "<br>";
	    }

	mysqli_close($connection);

	return $sql;
	return $result;
	return $rows;

}

function get_option($option_name) {
	$a = db_connect($option_name , 'options', 'get');
	return $a;
}


 ?>