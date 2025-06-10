<?php
require_once 'functions.php';

use Projekt_Szarka\Message;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $messageText = trim($_POST['message']);

    $message = new Message();
    $response = $message->saveMessage($name, $email, $messageText);
}
?>
