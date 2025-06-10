<?php
    use Projekt_Szarka\Message;

    require_once "parts/functions.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
        header("Location: index.php");
        exit;
    }
    $txt = new Message();
    $messages = $txt->getAllMessages();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
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
                    <span>Messages</span>
                </div>

                <div class="content">
                    <?php
                        if (!empty($messages)) {
                            echo '<ul class="message-list">';
                            foreach ($messages as $msg) {
                                echo '<li class="message">';
                                echo '<p><strong>Name:</strong> ' . htmlspecialchars($msg['name']) . '</p>';
                                echo '<p><strong>Email:</strong> ' . htmlspecialchars($msg['email']) . '</p>';
                                echo '<p><strong>Message:</strong> ' . nl2br(htmlspecialchars($msg['message'])) . '</p>';
                                echo '<hr>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>No messages found.</p>';
                        }
                    ?>

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