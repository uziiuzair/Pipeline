<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Check is a session exists
if (!Pipeline\Sessions::get('user')) {
    header("Location: /");
}

$authAdded = '';
if (!empty($_POST['keyname'])) {
    Pipeline\Pipes\Auth::add($_POST['keyname'], $_POST['keyvalue']);
}

$apiKey = Pipeline\Functions::generateApi();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title><?= Pipeline\Config::SITE_NAME ?> | Auth Keys</title>

    <?= Pipeline\Templater::getStyles() ?>
    <?= Pipeline\Templater::getScripts() ?>

    <script>
        $(document).ready(function () {
            $('#addKey').click(function () {
                $('#addKeyBlock').slideToggle();
            })
        });
    </script>

</head>

<body class="dashboard auth">

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
                     alt="<?= Pipeline\Sessions::get('user')->name ?>"/>
            </li>

        </ul>

    </div>

</div>

<?= Pipeline\Templater::sideBar() ?>

<div class="container">

    <header>
        <h1>Auth Keys</h1>
        <p><a id="addKey" href="#">Add key</a></p>
    </header>

    <div class="blockContainer">

        <div id="addKeyBlock" class="block hidden block_addAuth">

            <header>
                <h2>Add Key</h2>
            </header>

            <div class="content">

                <form action="" method="post">

                    <ul class="clearfix">

                        <li><input type="text" name="keyname" placeholder="Hook Name"></li>

                        <li><input type="text" name="keyvalue" value="<?= $apiKey; ?>"></li>

                        <li>
                            <button>Add Key</button>
                        </li>

                    </ul>

                </form>

            </div>

        </div>

        <?php

        if ($authAdded == '') {

        } else {
            echo '<p style="color:#37a628; margin-bottom:15px;">' . $authAdded . '</p>';
        }

        ?>

        <!-- Latest Hooks -->
        <div class="block">

            <header>
                <h2>All Auth Keys</h2>
            </header>

            <div class="content">

                <ul class="authInformation clearfix">
                    <li>Hook Name</li>
                    <li>Auth Key</li>
                </ul>
                <?php

                $allAuths = Pipeline\Pipes\Auth::getAuths();

                $authRows = sizeof($allAuths);
                $i = 0;
                foreach ($allAuths as $auth) {
                    if ($i == $authRows) {
                        break;
                    }
                    echo Pipeline\Pipes\Auth::generateDashEntity($auth, true);
                    $i++;
                }

                ?>

            </div>

        </div>

    </div>

</div>

</body>

</html>