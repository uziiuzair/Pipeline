<?php

namespace uziiuzair\Pipeline\Calls;

/**
 * Class Mailgun
 * @package uziiuzair\Pipeline\Calls
 */
class Mailgun
{

	private function verify($apiKey, $token, $timestamp, $signature) {
		
		//check if the timestamp is fresh
		if (abs(time() - $timestamp) > 15) {
			return false;
		}

		//returns true if signature is valid
		return hash_hmac('sha256', $timestamp.$token, $apiKey) === $signature;
	
	}

	switch ($callType) {
		case 'bounce':
			# code...
			break;
		case 'deliver':
			# code...
			break;
		case 'drop':
			# code...
			break;
		case 'spam':
			# code...
			break;
		case 'unsubscribe':
			# code...
			break;
		case 'click':
			# code...
			break;
		case 'open':
			# code...
			break;
	}

}