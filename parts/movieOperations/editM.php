<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "editMovie") {
    $name = $_POST["name"] ?? '';
    $id = $movie->getID($name) ?? '';
    $rating = $_POST["rating"] ?? '';
    $date = $_POST["premiere"] ?? '';
    $category = $_POST["category"] ?? '';

    $imagePath = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES["image"]["name"]);
        $targetDir = "uploads/";

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . time() . "_" . $imageName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        }
    }


    $check = $movie->updateMovie($id, $name, $rating, $date, $category, $imagePath);
    $message = $check ? $check : "Error updating movie review.";
}