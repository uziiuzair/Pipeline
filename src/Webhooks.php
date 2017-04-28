<?php 

namespace uziiuzair\Pipeline;

/**
 * Class WebHooks
 * @package uziiuzair\Pipeline
 */
class WebHooks
{

	 /**
     * @return bool|array
     */
    public static function getHooks()
    {
        if (!Config::$db) {
            Config::db();
        }

        $query = Config::$db->query("SELECT * FROM webhooks");

        return $query->fetch_all(MYSQLI_ASSOC);
    }

	/**
     * @param array $hook
     * @param bool $hookInf
     * @return string
     */
    public static function generateDashEntity($hook, $hookInf = false)
    {
        return '
                <ul class="clearfix webhooks">
                	<a href="hook.php?id='.$hook['id'].'">
                    <li><p>' . $hook['service'] . '</p></li>
                    <li><p>' .$hook['date'] . '</p></li>
                    </a>
                </ul>
        ';
    }

}

?>