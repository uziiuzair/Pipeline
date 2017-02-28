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

    <title><?= Pipeline\Config::SITE_NAME; ?> | Webhooks</title>

    <?= Pipeline\Templater::getStyles() ?>
    <?= Pipeline\Templater::getScripts() ?>

</head>

<body class="dashboard">

<div class="header clearfix">

    <div class="logo clearfix">
        <div class="icon">P</div>
        <div class="name">
            <p>Pipelines</p>
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

            <li>
                <img src="<?= Pipeline\Pipes\Gravatar::get(Pipeline\Sessions::get('user')->email) ?>"
                     class="gravatar"
                     alt="<?= Pipeline\Sessions::get('user')->name ?>">
            </li>

        </ul>

    </div>

</div>

<?= Pipeline\Templater::sideBar() ?>

<div class="container">

    <header>
        <h1>Web Hooks</h1>
        <p><a href="/webhooks.php">Refresh</a></p>
    </header>

    <div class="blockContainer">

        <!-- Latest Hooks -->
        <div class="block">

            <header>
                <h2>Latest Hooks</h2>
            </header>

            <div class="content">


            </div>

        </div>

    </div>

</div>

</body>

</html>