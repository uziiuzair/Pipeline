<?php use uziiuzair\Pipeline;

/**
 * Getting the server request
 */
$page = Pipeline\Routes::getServerRequest('');

if (!Pipeline\Sessions::get('studioUserLogin')) {
	header('Location: ' . Pipeline\Config::AuthServerURL);
}

switch ($page) {
	case 'dashboard':
		
		

		break;

	default:

		
		
		break;
}