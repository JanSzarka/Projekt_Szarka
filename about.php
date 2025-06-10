<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | About</title>

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
							<span>About us</span>
						</div>

						<div class="row">
							<div class="col-md-4">
								<figure><img src="dummy/figure.jpg" alt="figure image"></figure>
							</div>
							<div class="col-md-8">
								<p class="leading">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam.</p>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-md-9">
								<h2 class="section-title">Vision &amp; Misssion</h2>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>

								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam dignissimos ducimus qui blanditiis praesentium voluptatum atque.</p>
							</div>
							<div class="col-md-3">
								<h2 class="section-title">Useful Links</h2>
								<ul class="arrow">
									<li><a href="#">Eiusmod tempor incididunt</a></li> 
									<li><a href="#">Tenim ad minim venia</a></li>
									<li><a href="#">Quis nostrud exercitation</a></li> 
									<li><a href="#">Ullamco laboris reprehenderit</a></li> 
									<li><a href="#">Duis aute dolor voluptat</a></li>
									<li><a href="#">Velit esse cillum dolore</a></li> 
									<li><a href="#">Excepteur sint occaeca</a></li>
								</ul>
							</div>
						</div> <!-- .row -->
						
						<h2 class="section-title">Our Team</h2>
						<div class="row">

							<div class="col-md-3">
								<div class="team">
									<figure class="team-image"><img src="dummy/person-1.jpg" alt=""></figure>
									<h2 class="team-name">Sarah Stuart</h2>
									<small class="team-title">Co-founder</small>
									<div class="social-links">
										<a href="" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="" class="google-plus"><i class="fa fa-google-plus"></i></a>
										<a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="team">
									<figure class="team-image"><img src="dummy/person-2.jpg" alt=""></figure>
									<h2 class="team-name">John Doe</h2>
									<small class="team-title">Managing Director</small>
									<div class="social-links">
										<a href="" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="" class="google-plus"><i class="fa fa-google-plus"></i></a>
										<a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="team">
									<figure class="team-image"><img src="dummy/person-3.jpg" alt=""></figure>
									<h2 class="team-name">Jessica Branson</h2>
									<small class="team-title">Reviewer</small>
									<div class="social-links">
										<a href="" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="" class="google-plus"><i class="fa fa-google-plus"></i></a>
										<a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="team">
									<figure class="team-image"><img src="dummy/person-4.jpg" alt=""></figure>
									<h2 class="team-name">Sarah Stuart</h2>
									<small class="team-title">Consultant</small>
									<div class="social-links">
										<a href="" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="" class="google-plus"><i class="fa fa-google-plus"></i></a>
										<a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>
									</div>
								</div>
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