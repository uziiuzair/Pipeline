<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Check is a session exists
if (Pipeline\Sessions::get('user')) {
    header("Location: /dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= Pipeline\Config::SITE_NAME ?></title>

    <?= Pipeline\Templater::getStyles() ?>
</head>
<body class="login">
<div class="overlay">
    <div class="main">
        <h1>P</h1>
        <div class="loginForm">
            <h2><?= !empty($error) ? $error : 'Hey there!' ?></h2>
            <form action="login.php" method="post">
                <div class="inputContainer">
                    <input id="name" name="username" placeholder="Username" type="text">
                    <i class="fa fa-user-o"></i>
                </div>
                <div class="inputContainer">
                    <input id="password" name="password" placeholder="Password" type="password">
                    <i class="fa fa-lock"></i>
                </div>
                <input <?= !empty($error) ? 'style="background: #b44343;"' : '' ?> name="submit" type="submit"
                                                                                  value="Log in">
            </form>
        </div>
    </div>
</div>
</body>
</html>
