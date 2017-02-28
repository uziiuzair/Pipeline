<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Check is a session exists
if (Pipeline\Sessions::destroy()) {
    header("Location: /");
}