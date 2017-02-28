<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

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
    new Pipeline\Calls\Mailgun;
} elseif (CALL == 'mailchimp') { // MAILCHIMP
    new Pipeline\Calls\MailChimp;
} elseif (CALL == 'customerio') { // CUSTOMER.IO
    new Pipeline\Calls\CustomerIO;
} else { // OTHERS
    new Pipeline\Calls\Others;
}