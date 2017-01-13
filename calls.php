<?php // Receive the Call.

$theCall = $_GET['c'];

if (empty($theCall)) {
	die('This file only accepts POST data');
} else {
	define('CALL', $theCall);
	echo CALL;
}


// MAILGUN
if (CALL == 'mailgun') {
	include 'include/calls/mailgun.php';
} elseif (CALL == 'mailchimp') {
	echo "MAILCHIMP";
} else {
	include 'include/calls/others.php';
}