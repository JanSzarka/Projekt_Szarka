<?php
    use Projekt_Szarka\Movie;

    require_once "parts/functions.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
        header("Location: index.php");
        exit;
    }

    $movie = new Movie();
    $message = "";

    require_once "parts/movieOperations/newM.php";
    require_once "parts/movieOperations/editM.php";
    require_once "parts/movieOperations/deleteM.php";
    require_once "parts/movieOperations/getM.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Add Review</title>
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="site-content">
    <?php
        $file_path = "parts/header.php";
        if (!include($file_path)) {
            echo "Failed to include $file_path";
        }
    ?>

    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="index.php">Home</a>
                    <span>Admin Panel</span>
                </div>

                <div class="content">

                    <?php if (!empty($message)): ?>
                        <div style="background-color: #f8f9fa; border: 1px solid #ccc; padding: 15px; font-size: large; border-radius: 5px;">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <h2 class="section-title">Add Movie Review</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="addMovie">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Movie Name:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Rating (1-10):</label>
                                    <input type="number" name="rating" class="form-control" min="1" max="10" required>
                                </div>
                                <div class="form-group">
                                    <label>Premiere Date:</label>
                                    <input type="date" name="premiere" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Category (e.g., Drama, Action):</label>
                                    <input type="text" name="category" class="form-control" required>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label>Image (poster):</label>
                                    <input type="file" name="image" accept="image/*" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="button">Submit Review</button>
                    </form>

                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

                    <h2 class="section-title">Edit Movie Review</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="editMovie">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Movie Name:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Rating (1-10):</label>
                                    <input type="number" name="rating" class="form-control" min="1" max="10" required>
                                </div>
                                <div class="form-group">
                                    <label>Premiere Date:</label>
                                    <input type="date" name="premiere" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Category (e.g., Drama, Action):</label>
                                    <input type="text" name="category" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Update Image (optional):</label>
                                    <input type="file" name="image" accept="image/*" class="form-control">
                                </div>
                            </div>

                            <button type="submit" class="button">Submit Change</button>
                    </form>


                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

                    <h2 class="section-title">Delete Movie Review</h2>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="deleteMovie">
                        <div class="form-group">
                            <label>Movie Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <button type="submit" class="button">Delete</button>
                    </form>

                    <br> <br> <br> <br> <br> <br>

                    <h2 class="section-title">Get Review Info</h2>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="getMovieInfo">
                        <div class="form-group">
                            <label>Movie Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <button type="submit" class="button">Get Info</button>
                    </form>


                </div>
            </div>
        </div>
    </main>

    <?php
        $file_path = "parts/footer.php";
        if (!include($file_path)) {
            echo "Failed to include $file_path";
        }
    ?>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>
</html>