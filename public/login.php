<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

if (isset($_POST['submit'])) {
    if (!Pipeline\Config::$db) {
        Pipeline\Config::db();
    }

    if (empty($_POST['username']) || empty($_POST['password'])) {
    
        $error = '<span style="font-size:20px;">Username and Password cannot be empty</span>';
    
    } else {
        Pipeline\Functions::login($_POST['username'], $_POST['password']);
    }

    // Check is a session exists
    if (Pipeline\Sessions::get('user')) {
        header("Location: ".Pipeline\Config::PIPES_PUBLIC."dashboard.php");
    } else {
        header("Location: ".Pipeline\Config::PIPES_PUBLIC);
    }
}