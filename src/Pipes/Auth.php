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

    public static function generateDashEntity($auth, $authInf = false)
    {
        return '
                <ul class="clearfix ' . ($authInf ? 'authInformation' : '') . '">
                    <li><span>' . $auth['authname'] . '</span></li>
                    <li><input title="Auth Key" type="text" value="' . $auth['authKey'] . '"></li>
                </ul>
        ';
    }

    public static function add($name, $key)
    {
        if (!Config::$db) {
            Config::db();
        }

        $stmt = Config::$db->prepare("INSERT INTO auth (authname, authKey) VALUES (?, ?)");
        $stmt->bind_param('ss', $name, $key);
        return $stmt->execute();
    }
}