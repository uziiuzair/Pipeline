<?php
use uziiuzair\Pipeline;


# System Defaults
# Do NOT edit these values
define('SystemWorkingDirectory'	, dirname(__DIR__, 1));						# System Current Working Directory
define('SystemRequestStartTime'	, time());									# System Request Start Time
define('SystemEnvironment'		, Pipeline\Config::SystemEnvironment);		# System Environment

# System Development
if (SystemEnvironment == 'development') {
	ini_set('display_errors', 1); 
}

/**
 * If Session Exists
 */
if (Pipeline\Sessions::get('studioUserLogin')) {

} 

// else {
// 	header('Location: ' . Pipeline\Config::AuthServerURL);
// }

/** 
 * The following function gets the request and returns the render
 * of the page.
 */
Pipeline\Routes::get();