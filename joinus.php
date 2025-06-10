

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Movie Review | Join Us</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>


		<div id="site-content">
            <?php
            $file_path = "parts/header.php";
            if(!include($file_path)) {
                echo"Failed to include $file_path";
            }
            ?>
            <main class="main-content">
                <div class="container">
                    <div class="page">
                        <div class="breadcrumbs">
                            <a href="index.php">Home</a>
                            <span>Join Us</span>
                        </div>

                        <div class="content">
                            <h2 class="section-title">Welcome to Our Community</h2>
                            <p>Join us by logging into your account or signing up for a new one.</p>

                            <div class="row">
                                <!-- Login Form -->
                                <div class="col-md-6">
                                    <div class="feature">
                                        <h3 class="feature-title">Login</h3>
                                        <form action="login.php" method="POST">
                                            <div class="form-group">
                                                <label for="login-username">Username:</label>
                                                <input type="text" id="login-username" name="username" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="login-password">Password:</label>
                                                <input type="password" id="login-password" name="password" required class="form-control">
                                            </div>
                                            <button type="submit" class="button">Log In</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Sign-Up Form -->
                                <?php require_once "parts/signup.php" ?>

                            </div>
                        </div>
                    </div>
                </div> <!-- .container -->
            </main>
            <?php
            $file_path = "parts/footer.php";
            if(!include($file_path)) {
                echo"Failed to include $file_path";
            }
            ?>
		</div>
		<!-- Default snippet for navigation -->



		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>