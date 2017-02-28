<?php

namespace uziiuzair\Pipeline;

session_start();

class Sessions
{
    public static function set($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    public static function un($key)
    {
        unset($_SESSION[$key]);
        return true;
    }

    public static function destroy()
    {
        session_destroy();
        return true;
    }
}