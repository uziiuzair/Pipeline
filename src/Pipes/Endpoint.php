<?php

namespace uziiuzair\Pipeline\Pipes;

use uziiuzair\Pipeline\Config;

class Endpoint
{
    public static function getEndpoints()
    {
        if (!Config::$db) {
            Config::db();
        }

        $query = Config::$db->query("SELECT * FROM endpoints");

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public static function generateDashEntity($endpoint, $authInf = false)
    {
        return '
                <ul class="clearfix ' . ($authInf ? 'authInformation' : '') . '">
                    <li><span>' . $endpoint['name'] . '</span></li>
                    <li><input title="Endpoint" type="text" value="' . $endpoint['endpoint'] . '" disabled></li>
                </ul>
        ';
    }

    public static function add($name, $endpoint)
    {
        if (!Config::$db) {
            Config::db();
        }

        $stmt = Config::$db->prepare("INSERT INTO endpoints (name, endpoint) VALUES (?, ?)");
        $stmt->bind_param('ss', $name, $endpoint);
        return $stmt->execute();
    }
}