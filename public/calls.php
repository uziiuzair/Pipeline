<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Call Type.
// Defines the type of call and appropriately decides the best way to add it to the MySQL Database
$theCall = isset($_GET['c']) ? $_GET['c'] : false;

// Receive the POST Data.
$postData = file_get_contents("php://input");
// echo $postData;

// Check whether the Type has been mentioned.
if (isset($_GET['type']) && !empty($_GET['type'])) {
    $callType = $_GET['type'];
}

// Check whether the Call has been mentioned. If not, KILL THE SCRIPT
if (empty($theCall)) {
    die('This file only accepts POST data');
}


switch ($theCall) {
    case 'mailgun':
        new Pipeline\Calls\Mailgun;
        break;
    case 'mailchimp':
        new Pipeline\Calls\MailChimp;
        break;
    case 'customerio':
        new Pipeline\Calls\CustomerIO;
        break;
    default:
        new Pipeline\Calls\Others;
        break;
}