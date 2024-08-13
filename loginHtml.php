<!--если чтоб то возвращай это код -->
<?php
//session_start();
//?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Login</title>-->
<!--    <link rel="stylesheet" href="css/style.css">-->
<!--    <link rel="stylesheet" href="css/login.css">-->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!--    <div class="login-section mt-4">-->
<!--        <form action="login.php" method="post">-->
<!--            <p class="loginText">Login</p>-->
<!--            --><?php
//            if (isset($_SESSION['errors'])) {
//                foreach ($_SESSION['errors'] as $error) {
//                    echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
//                }
//            }
//            ?>
<!--            <input type="text" class="form-control" placeholder="Login" required name="login" id="login" value="--><?php //= isset($_SESSION['login']) ? htmlspecialchars($_SESSION['login']) : '' ?><!--"><br>-->
<!--            <input type="password" class="form-control" required placeholder="Password" name="pass"><br>-->
<!--            <p>Don't have an account? <a href="registerHTML.php">Sign up</a></p>-->
<!--            <button type="submit">Login</button><br>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->
<!---->
<?php
//if (isset($_SESSION['errors'])) {
//    unset($_SESSION['errors']);
//    unset($_SESSION['login']);
//    unset($_SESSION['email']);
//}
//?>











<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
    <div class="login-section mt-4">
        <form action="login.php" method="post">
            <p class="loginText">Login</p>
            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
                }
                unset($_SESSION['errors']);
            }
            ?>
            <input type="text" class="form-control" placeholder="Login" required name="login" id="login" value="<?= isset($_SESSION['login']) ? htmlspecialchars($_SESSION['login']) : '' ?>"><br>
            <input type="password" class="form-control" required placeholder="Password" name="pass"><br>
            <p>Don't have an account? <a href="registerHTML.php">Sign up</a></p>
            <button type="submit">Login</button><br>
        </form>
    </div>
</div>
</body>
</html>
<?php
if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
}
?>
