<?php

namespace uziiuzair\Pipeline\Pipes;

use uziiuzair\Pipeline\Config;

class Auth
{
    public static function getAuths()
    {
        if (!Config::$db) {
            Config::db();
        }

        $query = Config::$db->query("SELECT * FROM auth");

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public static function generateDashEntity($auth)
    {
        return '
                <ul class="clearfix">
                    <li><span>' . $auth['authname'] . '</span></li>
                    <li><input title="Auth Key" type="text" value="' . $auth['authKey'] . '"></li>
                </ul>
        ';
    }
}