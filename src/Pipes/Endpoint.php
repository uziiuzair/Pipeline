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

    public static function generateDashEntity($endpoint)
    {
        return '
                <ul class="clearfix">
                    <li><span>' . $endpoint['name'] . '</span></li>
                    <li><input title="Endpoint" type="text" value="' . $endpoint['endpoint'] . '" disabled></li>
                </ul>
        ';
    }
}