<?php

namespace uziiuzair\Pipeline;

class Functions
{
    public static function generateApi()
    {
        return sha1(uniqid(mt_rand()));
    }

    public static function login($username, $password)
    {
        // To protect MySQLi injection for security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = Config::$db->escape_string($username);
        $password = Config::$db->escape_string($password);

        $user = new \stdClass();

        // SQL query to fetch information of registered users and finds user match.
        $stmt = Config::$db->prepare("SELECT * FROM users WHERE `username` = ?");
        $stmt->bind_param('s', $username);
        $stmt->bind_result(
            $user->id,
            $user->username,
            $user->password,
            $user->email,
            $user->name,
            $user->admin
        );
        $stmt->execute();
        $stmt->fetch();

        // If user is valid, login and set user data
        if ($user->password == $password) { // Change this in future to `password_verify()`
            $stmt->close();

            unset($user->password);
            unset($password);

            Sessions::set('user', $user);

            return true;
        } else {
            return false;
        }
    }
}