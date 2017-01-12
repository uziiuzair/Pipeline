<?php 

define('DEBUG', true);
if (DEBUG == true) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

// The Default Directory Path
if ( ! defined( 'PATH' ) ) {
	$defaultLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	define('PATH', $defaultLink);
}

$database_host = 'localhost';
$database_user = 'root';
$database_pass = 'root';
$database_db = 'pipeline';

include 'pipes.php';
include 'mysql_connect.php';
//include 'mysql_functions.php';
include 'functions.php';

// Uncomment The below and fill in your own values!
// These values appear mainly in Emails and not on the script itself.
// We recommend that you define PIPES_URL as the system is not good at guessing.
//define('SITE_NAME', 'Pipelines');
//define('COMPANY_NAME', 'uziiuzair.com');
//define('COMPANY_SITE', 'http://www.uziiuzair.com/');
define('PIPES_URL', 'http://localhost:8888/Pipeline/');

// Defines constans if not already defined.
defaultConstants();

?>