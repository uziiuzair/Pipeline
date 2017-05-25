<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Check is a session exists
if (!Pipeline\Sessions::get('user')) {
    header("Location: /");
}

$passError = false;
if (!empty($_POST['passwd'])) {
    if ($_POST['passwd'] == $_POST['passwdRent']) {
        $passError = !Pipeline\Pipes\Users::setPassword(Pipeline\Sessions::get('user')->username, $_POST['passwd']);
    } else {
        $passError = true;
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title><?= Pipeline\Config::SITE_NAME ?> | Account Settings</title>

    <?= Pipeline\Templater::getStyles() ?>
    <?= Pipeline\Templater::getScripts() ?>

</head>

<body class="dashboard accountSettings">

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
                    <a class="ico" href="https://github.com/uziiuzair/Pipeline/wiki"><i class="fa fa-question-circle"></i></a>
                </li>

                <li>
                    <a class="ico" href="https://github.com/uziiuzair/Pipeline"><i class="fa fa-github"></i></a>
                </li>

                <li>
                    <a href="#">
                        <p>Hey, <?= Pipeline\Sessions::get('user')->name ?>!</p>
                    </a>

                    <ul>

                        <li><a href="<?= Pipeline\Config::PIPES_PUBLIC ?>accountSettings.php">Account Settings</a></li>
                        <li><a href="<?= Pipeline\Config::PIPES_PUBLIC ?>logout.php">Logout</a></li>

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
            <h1>Account Settings</h1> </p>
        </header>

        <div class="blockContainer">

            <!-- Your Profile -->
            <div class="block profile">

                <header>
                    <h2>Your Profile</h2>
                </header>

                <div class="content">


                    <label for="name">Full Name</label>
                    <input type="text" name="fullname" id="name" value="<?= Pipeline\Sessions::get('user')->name ?>" disabled>

                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username"
                           value="<?= Pipeline\Sessions::get('user')->username ?>" disabled>

                    <label for="email">E-Mail</label>
                    <input type="text" name="email" id="email" value="<?= Pipeline\Sessions::get('user')->email ?>" disabled>

                    <label for="">Gravatar</label>
                    <img src="<?= Pipeline\Pipes\Gravatar::get(Pipeline\Sessions::get('user')->email) ?>"
                         class="gravatar"
                         alt="<?= Pipeline\Sessions::get('user')->username ?>"/>
                    <p style="color:#adaeb0; font-size: 13px; margin-top: 10px;">
                        You can change your gravatar at <a style="color:#007eff;text-decoration: none;"
                                                           href="https://gravatar.com">Gravatar.com</a></p>

                    <hr>

                    <form action="" method="post">
                        <label for="passwd">Change Password</label>

                        <input type="password" name="passwd" id="passwd" placeholder="Enter Password">
                        <input type="password" name="passwdRent" id="passwdRent" placeholder="Re-Enter Password">

                        <?php

                        if ($passError) {
                            echo '<p style="color:#b44343; margin-bottom:15px;">Passwords do not match!</p>';
                        }

                        ?>

                        <button>Submit</button>
                    </form>

                </div>

            </div>

        </div>

        <footer>
            <p><?php echo date('Y'); ?> &copy; <?= Pipeline\Config::SITE_NAME; ?></p>
        </footer>

    </div>

</body>

</html>