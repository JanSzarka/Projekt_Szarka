<?php
require_once "parts/functions.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: index.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
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
                    <h2 class="section-title">Add Movie Review</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
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
                                    <label>Length (e.g., 2h 13m):</label>
                                    <input type="text" name="length" class="form-control" required>
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Directors:</label>
                                    <input type="text" name="directors" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Writers:</label>
                                    <input type="text" name="writers" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Stars:</label>
                                    <input type="text" name="stars" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>About Movie:</label>
                                    <textarea name="description" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image (poster):</label>
                                    <input type="file" name="image" accept="image/*" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="button">Submit Review</button>
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