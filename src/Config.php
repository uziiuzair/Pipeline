<?php

namespace uziiuzair\Pipeline;

/**
 * Class Config
 * @package uziiuzair\Pipeline
 */
class Config
{

    // Default Site Details
    const SITE_NAME = 'Pipelines';
    const COMPANY_NAME = 'uziiuzair.com';
    const COMPANY_SITE = 'http://www.uziiuzair.com/';
    const PIPES_URL = 'http://pipelines.dev/'; // MUST end with a forward slash http://www.example.com/
    const PIPES_PUBLIC = 'http://pipelines.dev/public/'; // MUST end with a forward slash http://www.example.com/

    // Default Database Details
    const DB_HOST = 'localhost'; 
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_NAME = 'pipeline';

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
            self::$db = new \mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);
        }
        return self::$db;
    }

}