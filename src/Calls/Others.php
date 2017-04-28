<?php

namespace uziiuzair\Pipeline\Calls;

/**
 * Class Others
 * @package uziiuzair\Pipeline\Calls
 */
class Others
{

	public function __contruct () {
		switch ($callType) {
			case 'test':
				# code...
				break;
			default:
				echo "Hello!";
				break;
		}	
	}
	
}