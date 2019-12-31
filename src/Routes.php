<?php
namespace uziiuzair\Pipeline;

/**
 * Class Routes
 * @package studio\app
 */
class Routes
{


	/** 
	 * Get Request
	 * 
	 * @return string
	 */
	public static function get() {

		$request  	= str_replace("", "", $_SERVER['REQUEST_URI']);
		$request 	= explode('?', $request);

		$theRequest  	= $request[0];
		$requestArray 	= rtrim($theRequest, '/');
		$requestArray 	= explode('/', $requestArray);

		if (!empty($request[1])) {
			$theVariables 	= $request[1];
			$variableArray 	= rtrim($theVariables, '/');
			$variableArray 	= explode('/', $variableArray);
		}

		$page = Routes::process($requestArray);

		// print_r($page);

		if ($page == 'upload') {
			
			include '../controller/upload.php';
			return;
		
		} elseif ($page == 'action') {
		
			include '../controller/actions.php';
			return;
		
		} else {

			include '../controller/routes.php';
			return;
		}

	}


	/** 
	 * Process Requests
	 * 
	 * @return string
	 */
	public static function process($request) {

		/** 
		 * Check to see whether the request is empty or not.
		 */
		if (!empty($request[1])) {

			# Check to see if there are any hard-coded terms (upload/action..)
			if ($request[1] == 'upload') {
				
				$page = 'upload';

			# Check if request is an action
			} elseif ($request[1] == 'action') {
			
				$page = 'action';

			# If request is a, switch page to view
			} elseif ($request[1] == 'a') {
			
				$page = 'view';

			# Check if there is an active session
			} elseif (!Sessions::get('studioUserLogin')) {

				/** 
				 * If no active session is found,
				 * check whether user requested the register page 
				 */
				if( $request[1] == 'register' ) {
			
					# Set to register page 
					$page = 'register';
				
				} else {
			
					# Otherwise set to the login page
					$page = 'login';
			
				}
				
			} else {

				/** 
				 * Session found. Set Page to value of request
				 */
				$page = $request[1];

			}

		} else {

			/** 
			 * If the request is empty, check whether a session exists
			 * If one does, point application to dashboard, otherwise 
			 * Go to login page.									   
			 */
			if (Sessions::get('studioUserLogin')) {
				$page = 'dashboard';
			} else {
				$page = 'login';
			}

		}

		return $page;
		// print_r($request);

	}

	/**
	 * String Contains
	 * @param $haystack
	 * @param $needle
	 * @param $caseSensitive
	 * @return string
	 */
	public static function contains($haystack, $needle, $caseSensitive = false) {
		return $caseSensitive ?
			(strpos($haystack, $needle) === FALSE ? FALSE : TRUE):
			(stripos($haystack, $needle) === FALSE ? FALSE : TRUE);
	}


	/**
	 * Origin URL
	 * @param $s
	 * @param $use_forwarded_host
	 * @return string
	 */
	public static function originURL($s, $use_forwarded_host = false) {

		$ssl      	= ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
		$sp       	= strtolower( $s['SERVER_PROTOCOL'] );
		$protocol 	= substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
		$port     	= $s['SERVER_PORT'];
		$port     	= ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
		$host     	= ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
		$host     	= isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
		
		return $protocol . '://' . $host;
	
	}

	/**
	 * Full URL
	 * @param $s
	 * @param $use_forwarded_host
	 * @return string
	 */
	public static function fullURL($s, $use_forwarded_host = false ) {
	
		return Routes::originURL( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
	
	}

	/**
	 * Append to URL
	 * @param $append
	 * @return string
	 */
	public static function appendToURL($append) {
		
		$url 	=	Routes::fullURL($_SERVER);

		if (Routes::contains($url, $append)) {
			return $url;			
		} else {
			if (Routes::contains($url, '?p=')) {
				return $url . '&' .  $append;
			} else {
				return $url . $append;
			}
		}

	}

	/**
	 * URL
	 * Use this for all URL Rediretion
	 * USAGE: <a href="<?php app\Routes::url('go_to_url'); ?>">blabla</a> 
	 * @param $append
	 * @return string
	 */
	public static function url($append) {
		
		$url 	=	Config::SystemPublicURL;
		
		if (Routes::contains($url, $append)) {
			return $url;			
		} else {
			return $url . $append;
		}

	}


	/**
	 * Current Page Requested
	 * Get's the name of the requested URL
	 * USAGE: 
	 * @param $replace = start and end with forward slash.
	 * @return string
	 */
	public static function getServerRequest($replace = '') { 

		$request  	= str_replace($replace, "", $_SERVER['REQUEST_URI']);
		$request 	= explode('?', $request);

		$theRequest   = $request[0];
		$requestArray = rtrim($theRequest, '/');
		$view 			= explode('/', $requestArray);

		if (!empty($request[1])) {
			$theVariables 	= $request[1];
			$variableArray 	= rtrim($theVariables, '/');
			$variableArray 	= explode('/', $variableArray);
		}

		if ($view[0] == '') {
			
			if (isset($view[1])) {
				if (isset($view[2])) {
					$page 	=	$view[1] . '/' . $view[2];
				} else {
					$page 	=	$view[1];
				}
			} else {
				$page = Config::SystemDefaultPage;
			}

		} else {

			if (isset($view[0])) {
				if (isset($view[1])) {
					$page 	=	$view[0] . '/' . $view[1];
				} else {
					$page 	=	$view[0];
				}
			}

		}

		return $page;

	}


	public static function urltoarray($url) {

		$url = stripslashes($url);
		$array = explode('/', $url);

		return $array;

	}

}














