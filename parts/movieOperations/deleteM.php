<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "deleteMovie") {
    $name = $_POST["name"] ?? '';

    $check = $movie->deleteMovieByName($name);
    $message = $check ? $check : "Error deleting movie.";
}