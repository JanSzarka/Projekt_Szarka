<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "addMovie") {

    $name = $_POST["name"] ?? '';
    $rating = $_POST["rating"] ?? '';
    $date = $_POST["premiere"] ?? '';
    $category = $_POST["category"] ?? '';

    $imagePath = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES["image"]["name"]);
        $targetDir = "uploads/";

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Create the directory if it doesn't exist
        }

        $targetFile = $targetDir . time() . "_" . $imageName; // Prevent duplicate filenames

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        }
    }


    $check = $movie->newMovie($name, $rating, $date, $category, $imagePath);
    if ($check) {
        $message = $check;
    } else {
        $message = "Error creating account.";
    }


}
?>