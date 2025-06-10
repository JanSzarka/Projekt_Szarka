<?php
    require_once "parts/functions.php";

    use Projekt_Szarka\DataLoader;

    $dataLoader = new DataLoader("data/data.json");

    try {
        $slides = $dataLoader->getSection('slides');
    } catch (Exception $e) {
        $slides = [];
    }
?>



<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review</title>

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
						<div class="row">
							<div class="col-md-9">

                                <div class="slider">
                                    <ul class="slides">
                                        <?php
                                        for ($i = 0, $len = count($slides); $i < $len; $i++) {
                                            $slide = $slides[$i];
                                            ?>
                                            <li>
                                                <a href="#"><img src="<?= htmlspecialchars($slide['src']) ?>" alt="<?= htmlspecialchars($slide['alt']) ?>"></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>


							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-sm-6 col-md-12">
										<div class="latest-movie">
											<a href="#"><img src="dummy/thumb-1.jpg" alt="Movie 1"></a>
										</div>
									</div>
									<div class="col-sm-6 col-md-12">
										<div class="latest-movie">
											<a href="#"><img src="dummy/thumb-2.jpg" alt="Movie 2"></a>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- .row -->
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/thumb-3.jpg" alt="Movie 3"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/thumb-4.jpg" alt="Movie 4"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/thumb-5.jpg" alt="Movie 5"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/thumb-6.jpg" alt="Movie 6"></a>
								</div>
							</div>
						</div> <!-- .row -->

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