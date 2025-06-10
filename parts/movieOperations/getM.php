<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"]) === "getMovieInfo") {

        $name = $_POST["name"];
        $movieDetails = $movie->getMovieByName($name);

        if ($movieDetails) {

            $message = "<div style='background-color: #f8f9fa; border: 1px solid #ccc; padding: 15px; font-size: large; border-radius: 5px; max-width: 500px;'>
                            <h3 style='color: #333; border-bottom: 2px solid #ddd; padding-bottom: 5px;'>Movie Details</h3>
                            <p><strong>Name:</strong> {$movieDetails['name']}</p>
                            <p><strong>Rating:</strong> {$movieDetails['rating']}</p>
                            <p><strong>Premiere Date:</strong> {$movieDetails['date']}</p>
                            <p><strong>Category:</strong> {$movieDetails['category']}</p>";

            if (!empty($movieDetails['image'])) {
                $message .= "<p><strong>Poster:</strong><br>
                                <img src='{$movieDetails['image']}' alt='Movie Poster' 
                                style='width: 200px; border-radius: 5px; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); margin-top: 10px;'>
                             </p>";
            }

            $message .= "</div>";

        } else {
            $message = "<p style='color: red; font-size: large'>No movie found with that name.</p>";
        }
    }
?>