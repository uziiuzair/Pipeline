<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

if (isset($_POST['submit'])) {
    if (!Pipeline\Config::$db) {
        Pipeline\Config::db();
    }

    Pipeline\Functions::login($_POST['username'], $_POST['password']);

    // Check is a session exists
    if (Pipeline\Sessions::get('user')) {
        header("Location: /dashboard.php");
    } else {
        header("Location: /");
    }
}