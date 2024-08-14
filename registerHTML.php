<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/signIn.css">
</head>
<body>
<!-- registerHTML.php -->
<div class="container">
    <div class="register-section mt-4">
        <form action="register.php" method="post" id="registration">
            <p class="registerText">Sign up</p>
            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
                }
            }
            ?>
            <input type="text" class="form-control" placeholder="Login" required name="login" id="login" value="<?= isset($_SESSION['login']) ? htmlspecialchars($_SESSION['login']) : '' ?>"><br>
            <input type="password" class="form-control" required placeholder="Password" name="pass"><br>
            <input type="password" class="form-control" required placeholder="Repeat password" name="repeatpass"><br>
            <input type="text" class="form-control" required placeholder="E-mail" name="email" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>"><br>
            <p>Already have an account? <a href="loginHTML.php">Login</a></p>
            <button type="submit" id="signUp">Sign Up</button><br>
        </form>
    </div>
</div>

</body>
</html>

<?php
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
    unset($_SESSION['login']);
    unset($_SESSION['email']);
}
?>
