<?php

namespace uziiuzair\Pipeline;

session_start();

/**
 * Class Sessions
 * @package uziiuzair\Pipeline
 */
class Sessions
{
    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function set($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function un($key)
    {
        unset($_SESSION[$key]);
        return true;
    }

    /**
     * @return bool
     */
    public static function destroy()
    {
        session_destroy();
        return true;
    }
}