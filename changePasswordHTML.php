<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/changePassword-style.css">
</head>
<body>
<div class="container">
    <div class="change-section mt-4">
        <form action="changePassword.php" method="post">
            <p class="loginText">Change Password</p>
            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
                }
                unset($_SESSION['errors']);
            }
            if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
                unset($_SESSION['success']);
            }
            ?>
            <input type="password" class="form-control" placeholder="Current Password" required name="currentPass"><br>
            <input type="password" class="form-control" required placeholder="New Password" name="newPass"><br>
            <input type="password" class="form-control" required placeholder="Repeat Password" name="repeatNewPass"><br>
            <p>Go to main <a href="loggedIndex.php">Go main</a></p>
            <button type="submit">Change Password</button><br>
        </form>
    </div>
</div>
</body>
</html>
