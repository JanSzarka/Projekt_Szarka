<?php
    require_once __DIR__ . '/../functions.php';

    use Projekt_Szarka\User;

    $user = new User();
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["action"] ?? '') === "signup") {

        $username = $_POST["username"] ?? '';
        $password = $_POST["password"] ?? '';
        $check = $user->saveUser($username, $password);

        if ($check) {
            $message = $check;
        } else {
            $message = "Error creating account.";
        }
    }
?>

<div class="col-md-6">
    <div class="feature">
        <h3 class="feature-title">Create an Account</h3>
        <form action="" method="POST">
            <input type="hidden" name="action" value="signup">
            <div class="form-group">
                <label for="signup-username">Username:</label>
                <input type="text" id="signup-username" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="signup-password">Password:</label>
                <input type="password" id="signup-password" name="password" required class="form-control">
            </div>
            <button type="submit" class="button">Sign Up</button>
        </form>

        <?php if (!empty($message)): ?>

            <p><?= htmlspecialchars($message) ?></p>

        <?php endif; ?>

    </div>
</div>