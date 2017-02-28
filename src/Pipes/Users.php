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

    public static function getUser($username)
    {
        if (!Config::$db) {
            Config::db();
        }

        $user = new \stdClass();

        $stmt = Config::$db->prepare("SELECT id, username, email, fullname, admin FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->bind_result(
            $user->id,
            $user->username,
            $user->email,
            $user->name,
            $user->admin
        );
        $stmt->execute();
        $stmt->fetch();

        return $user;
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

    public static function setPassword($username, $password)
    {
        if (!Config::$db) {
            Config::db();
        }

        $stmt = Config::$db->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->bind_param('ss', $password, $username);
        return $stmt->execute();
    }
}