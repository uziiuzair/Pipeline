<?php

namespace uziiuzair\Pipeline\Pipes;

use uziiuzair\Pipeline\Config;

class Users
{
    public static function getUsers()
    {
        if (!Config::$db) {
            Config::db();
        }

        $query = Config::$db->query("SELECT * FROM users");

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public static function generateDashEntity($auth, $authInf = false)
    {
        return '
                <ul class="clearfix ' . ($authInf ? 'userInformation' : '') . '">
                    <li><span>' . $auth['id'] . '</span></li>
                    <li><span>' . $auth['username'] . '</span></li>
                    <li><span>' . $auth['email'] . '</span></li>
                    <li><span>' . $auth['fullname'] . '</span></li>
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