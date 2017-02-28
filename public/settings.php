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

    <title><?= Pipeline\Config::SITE_NAME ?> | Pipeline Settings</title>

    <?= Pipeline\Templater::getStyles() ?>
    <?= Pipeline\Templater::getScripts() ?>

</head>

<body class="dashboard pipeSettings">

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

                    <li><a href="accountSettings.php">Account Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>

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
        <h1>Pipeline Settings</h1>
        <p style="color:#adaeb0;">The current user is <a><?= Pipeline\Sessions::get('user')->username ?></a></p>
    </header>

    <div class="blockContainer">

        <!-- Your Profile -->
        <div class="block profile">

            <header>
                <h2>General Settings</h2>
            </header>

            <div class="content">


                <label for="name">Full Name</label>
                <input type="text" name="fullname" id="name" value="<?= Pipeline\Sessions::get('user')->name ?>">

                <label for="username">User Name</label>
                <input type="text" name="username" id="username"
                       value="<?= Pipeline\Sessions::get('user')->username ?>">

                <label for="email">E-Mail</label>
                <input type="text" name="email" id="email" value="<?= Pipeline\Sessions::get('user')->email ?>">

                <label for="">Gravatar</label>
                <img src="<?= Pipeline\Pipes\Gravatar::get(Pipeline\Sessions::get('user')->email) ?>"
                     class="gravatar"
                     alt="<?= Pipeline\Sessions::get('user')->username ?>"/>
                <p style="color:#adaeb0; font-size: 13px; margin-top: 10px;">
                    You can change your gravatar at <a style="color:#007eff;text-decoration: none;"
                                                       href="https://gravatar.com">Gravatar.com</a>
                </p>

            </div>

        </div>

        <hr>

        <?php if (Pipeline\Sessions::get('user')->admin == 1) { ?>

            <div class="block addUser users">
                <header>
                    <h2>Add New User</h2>
                </header>

                <div class="content">

                    <ul class="userInformation add clearfix">
                        <li>
                            <input type="text" name="userFullName" placeholder="Full Name">
                        </li>
                        <li>
                            <input type="text" name="userUsername" placeholder="Username">
                        </li>
                        <li>
                            <input type="email" name="userEmail" placeholder="Email">
                        </li>
                        <li>
                            <input type="password" name="userPassword" placeholder="Password">
                        </li>
                        <li>
                            <input type="checkbox" name="isAdmin"><label for="isAdmin">Is Admin?</label>
                        </li>
                        <li>
                            <button>Add User</button>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="block users">

                <header>
                    <h2>Users</h2>
                </header>

                <div class="content">
                    <ul class="userInformation clearfix">
                        <li>ID</li>
                        <li>Username</li>
                        <li>Email</li>
                        <li>Full Name</li>
                    </ul>

                    <?php

                    $allUsers = Pipeline\Pipes\Users::getUsers();

                    $i = 0;
                    foreach ($allUsers as $user) {
                        echo Pipeline\Pipes\Users::generateDashEntity($user, true);
                    }

                    ?>
                </div>

            </div>

        <?php } ?>

    </div>

</div>

</body>

</html>