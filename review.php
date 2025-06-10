<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Review</title>

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
							<span>Movie Review</span>
						</div>


						<div class="movie-list">
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">Maleficient</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-4.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">The adventure of Tintin</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-5.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">Hobbit</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-6.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">Exists</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-1.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">Drive hard</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-2.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">Robocop</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-7.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">Life of Pi</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-8.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.html">The Colony</a></div>
								<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
							</div>
						</div> <!-- .movie-list -->

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