<?php
require '../vendor/autoload.php';
use uziiuzair\Pipeline;

// Check is a session exists
if (!Pipeline\Sessions::get('user')) {
    header("Location: /");
}

$pointAdded = '';
if(!empty($_POST['keyname'])) {
	Pipeline\Pipes\Endpoint::add($_POST['keyname'], $_POST['keyvalue']);
}
?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<title><?php Pipeline\Config::SiteName; ?> | Auth Keys</title>

        <?php Pipeline\Templater::getStyles() ?>
        <?php Pipeline\Templater::getScripts() ?>

		<script>
			$(document).ready(function(){
				$('#addKey').click(function(){
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
					<p><?php Pipeline\Config::SiteName ?></p>
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
							<p>Hey, <?php Pipeline\Sessions::get('user')->name ?>!</p>
						</a>

		                <ul>

		                    <li><a href="<?php Pipeline\Config::PIPES_PUBLIC ?>accountSettings.php">Account Settings</a></li>
		                    <li><a href="<?php Pipeline\Config::PIPES_PUBLIC ?>logout.php">Logout</a></li>

		                </ul>
					
					</li>

					<li>
                        <img src="<?php Pipeline\Pipes\Gravatar::get(Pipeline\Sessions::get('user')->email) ?>"
                             class="gravatar"
                             alt="<?php Pipeline\Sessions::get('user')->name ?>">
                    </li>
			
				</ul>
			
			</div>

		</div>

        <?php Pipeline\Templater::sideBar() ?>

		<div class="container">

			<header>
				<h1>End Points</h1> <p><a id="addKey" href="#">Add Endpoint</a></p>
			</header>
			
			<div class="blockContainer">

				<div id="addKeyBlock" class="block hidden block_addAuth">
					
					<header>
						<h2>Add Endpoint</h2>
					</header>

					<div class="content">
						
						<form action="" method="post">
							
							<ul class="clearfix">
							
								<li><input type="text" id="keyname" name="keyname" placeholder="Hook Name"></li>
							
								<li><input type="text" id="keyvalue" name="keyvalue" value="<?php Pipeline\Config::PipelinesUrl ?>calls.php?c="></li>
							
								<li><button>Add Endpoint</button></li>
							
							</ul>

						</form>

					</div>
				
				</div>

				<?php 

				if ($pointAdded == '') {
					
				} else {
					echo '<p style="color:#37a628; margin-bottom:15px;">'. $pointAdded .'</p>';
				} 

				?>
				
				<!-- Latest Hooks -->
				<div class="block">

					<header>
						<h2>All Your End Points</h2>
					</header>

					<div class="content">
						
						<ul class="authInformation clearfix">
							<li>Hook Name</li>	
							<li>End Point URL</li>	
						</ul>

                        <?php

                        $allPoints = Pipeline\Pipes\Endpoint::getEndpoints();

                        foreach ($allPoints as $endpoint) {
                            echo Pipeline\Pipes\Endpoint::generateDashEntity($endpoint, true);
                        }

                        ?>

					</div>

				</div>

			</div>

			<footer>
				<p><?php echo date('Y'); ?> &copy; <?php Pipeline\Config::SiteName; ?></p>
			</footer>

		</div>

		<script>
			$(document).ready(function() {
				$('#keyname').keyup(function(e){
					var value = '<?php Pipeline\Config::PipelinesUrl ?>calls.php?c=' + $(this).val();
					$('#keyvalue').val(value);
				});
			});
		</script>
	</body>

</html>