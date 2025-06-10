<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once  __DIR__ . '/../functions.php';

    use Projekt_Szarka\User;

    $user = new User();
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"]) === "login") {
        try {

            $username = $_POST["username"];
            $password = $_POST["password"];
            $loginSuccess = $user->login($username, $password);

            if ($loginSuccess) {
                header("Location: index.php");
                exit;
            } else {
                $message = "Username or Password is incorrect";
            }

        } catch (Exception $e) {
            $message = "An error occurred. Please try again.";
        }
    }
?>

<div class="col-md-6">
    <div class="feature">
        <h3 class="feature-title">Login</h3>
        <form action="" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label for="login-username">Username:</label>
                <input type="text" id="login-username" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" required class="form-control">
            </div>
            <button type="submit" class="button">Log In</button>
        </form>

        <?php if (!empty($message)): ?>

            <p><?= htmlspecialchars($message) ?></p>

        <?php endif; ?>

    </div>
</div>