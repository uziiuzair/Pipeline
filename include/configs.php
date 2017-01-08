<?php 

define('DEBUG', true);
if (DEBUG == true) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

$database_host = 'localhost';
$database_user = 'root';
$database_pass = 'root';
$database_db = 'pipeline';

include 'pipes/default_constants.php';
include 'mysql_connect.php';
//include 'mysql_functions.php';
include 'functions.php';

defaultConstants();

// define('SITE_NAME', 'Pipelines');
// define('COMPANY_NAME', 'uziiuzair.com');
// define('COMPANY_SITE', 'http://www.uziiuzair.com/');
// define('PIPES_URL', 'http://localhost:8888/Pipeline/');


?>