<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Check is a session exists
if (!Pipeline\Sessions::get('user')) {
    header("Location: /");
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title><?= Pipeline\Config::SITE_NAME ?> | Dashboard</title>

    <?= Pipeline\Templater::getStyles() ?>
    <?= Pipeline\Templater::getScripts() ?>

</head>

<body class="dashboard">

<div class="header clearfix">

    <div class="logo clearfix">
        <div class="icon">P</div>
        <div class="name">
            <p><?= Pipeline\Config::SITE_NAME ?></p>
        </div>
    </div>

    <div class="navigation">

        <ul class="clearfix">

            <li>
                <a class="ico" href="#"><i class="fa fa-user"></i></a>
            </li>

            <li>
                <a class="ico" href="#"><i class="fa fa-user"></i></a>
            </li>

            <li>
                <a class="ico" href="#"><i class="fa fa-user"></i></a>
            </li>

            <li>
                <a href="#">
                    <p>Hey, <?= Pipeline\Sessions::get('user')->name ?>!</p>
                </a>

                <ul>

                    <li><a href="/accountSettings.php">Account Settings</a></li>
                    <li><a href="/logout.php">Logout</a></li>

                </ul>

            </li>

            <li><img src="<?= Pipeline\Pipes\Gravatar::get(Pipeline\Sessions::get('user')->email) ?>" class="gravatar"
                     alt="<?= Pipeline\Sessions::get('user')->name ?>"></li>

        </ul>

    </div>

</div>

<?= Pipeline\Templater::sideBar() ?>

<div class="container">

    <header>
        <h1>Dashboard</h1>
        <p><a href="/dashboard.php">Refresh</a></p>
    </header>

    <div class="blockContainer clearfix">

        <!-- Latest Hooks -->
        <div class="block dashBlocks">

            <header>
                <h2>Latest Hooks</h2>
            </header>

            <div class="content">

            </div>

        </div>

        <!-- Auth Keys -->
        <div class="block span6 dashBlocks">

            <header>
                <h2>Auth Keys</h2>
            </header>

            <div class="content">
                <?php

                $allAuths = Pipeline\Pipes\Auth::getAuths();

                $i = 0;
                foreach ($allAuths as $auth) {
                    if ($i == 5) {
                        break;
                    }
                    echo Pipeline\Pipes\Auth::generateDashEntity($auth);
                    $i++;
                }

                ?>
            </div>

        </div>

        <!-- Webhook Endpoints -->
        <div class="block span6 dashBlocks">

            <header>
                <h2>Auth Keys</h2>
            </header>

            <div class="content">

                <?php

                $allPoints = Pipeline\Pipes\Endpoint::getEndpoints();

                foreach ($allPoints as $endpoint) {
                    echo Pipeline\Pipes\Endpoint::generateDashEntity($endpoint);
                }

                ?>
            </div>

        </div>
    </div>
</div>
</body>
</html>