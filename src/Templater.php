<?php

namespace uziiuzair\Pipeline;

/**
 * Class Templater
 * @package uziiuzair\Pipeline
 */
class Templater
{
    /**
     * @return string
     */
    public static function getStyles()
    {
        return '
            <link href="assets/css/style.css?v=0.0.1" rel="stylesheet" type="text/css">
        ';
    }

    /**
     * @return string
     */
    public static function getScripts()
    {
        return '
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        ';
    }

    /**
     * @return string
     */
    public static function sideBar()
    {
        return '
            <div class="sidebar">
                <nav>
                    <ul>
                        <li><a href="dashboard.php"><i class="fa fa-user"></i><span>Dashboard</span></a></li>
                        <li><a href="webhooks.php"><i class="fa fa-user"></i><span>Web Hooks</span></a></li>
                        <li><a href="addhooks.php"><i class="fa fa-user"></i><span>End Points</span></a></li>
                        <li><a href="authkeys.php"><i class="fa fa-user"></i><span>Auth Key</span></a></li>
                        <li><a href="settings.php"><i class="fa fa-user"></i><span>Pipeline Settings</span></a></li>
                    </ul>
                </nav>
           </div>
        ';
    }
}