<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Return HTML Response Code
if (!function_exists('http_response_code'))
{
    function http_response_code($newcode = NULL)
    {
        static $code = 201;
        if($newcode !== NULL)
        {
            header('X-PHP-Response-Code: '.$newcode, true, $newcode);
            if(!headers_sent())
                $code = $newcode;
        }       
        return $code;
    }
}

// Call Type.
// Defines the type of call and appropriately decides the best way to add it to the MySQL Database
$theCall = isset($_GET['c']) ? $_GET['c'] : false;

// Receive the POST Data.
$postData = file_get_contents("php://input");
// echo $postData;

// Check whether the Type has been mentioned.
if (isset($_GET['type']) && !empty($_GET['type'])) {
    $callType = $_GET['type'];
} else {
    $callType = 'other';
}

// Check whether a Call has been mentioned. If not, KILL THE SCRIPT
if (empty($theCall)) {
    http_response_code(400);
    die('This file only accepts POST data');
}

// Set Response Code to 201
http_response_code(201);

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
        Pipeline\Calls\Others::addHook();
        break;
}