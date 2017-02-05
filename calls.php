<?php // Receive the Call.

// Call Type.
// Defines the type of call and appropriately decides the best way to add it to the MySQL Database
$theCall = $_GET['c'];

// Receive the POST Data.
$postData = file_get_contents("php://input");
// echo $postData;

// Check whether the Type has been mentioned.
if (!empty($_GET['type'])) {
	$callType = $_GET['type'];
}

// Check whether the Call has been mentioned. If not, KILL THE SCRIPT
if (empty($theCall)) {
	die('This file only accepts POST data');
} else {
	define('CALL', $theCall);
}


if (CALL == 'mailgun') { // MAILGUN 
	include 'include/calls/mailgun.php';
} elseif (CALL == 'mailchimp') { // MAILCHIMP
	echo "MAILCHIMP";
} elseif (CALL == 'customerio') { // CUSTOMER.IO
	include 'include/calls/customerio.php';
} else { // OTHERS
	include 'include/calls/others.php';
}