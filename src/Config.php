<?php

namespace uziiuzair\Pipeline;

/**
 * Class Config
 * @package uziiuzair\Pipeline
 */
class Config
{

	// Default Site Details
	const SiteName 			= 'Pipelines';
	const CompanyName 		= 'uziiuzair.com';
	const CompanySite 		= 'http://www.uziiuzair.com/';
	const PipelinesUrl 		= 'https://pipelines.dev:8890/';			# MUST end with a forward slash http://www.example.com/
	const PipelinesPublic 	= 'https://pipelines.dev:8890/'; 			# MUST end with a forward slash http://www.example.com/
	const SystemEnvironment = true;										#

	// Default Database Details
	const DatabaseHost 		= 'localhost'; 
	const DatabaseUser 		= 'root';
	const DatabasePass 		= 'root';
	const DatabaseName 		= 'pipeline';

	// Public values
	/**
	 * @var \mysqli
	 */
	public static $db;

	/**
	 * @return \mysqli
	 */
	public static function db()
	{
		if (!self::$db) {
			self::$db = new \mysqli(self::DatabaseHost, self::DatabaseUser, self::DatabasePass, self::DatabaseName);
		}
		return self::$db;
	}

}