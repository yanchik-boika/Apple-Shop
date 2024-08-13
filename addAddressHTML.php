<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addAddress</title>
<!--    <link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/addAddress.css">
</head>
<body>
<div class="container">
    <div class="addressForm mt-4">
        <form action="addAddress.php" method="post">
            <p class="loginText">Add new address: </p>
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
            <div class="form-block">
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required placeholder="Country"><br>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required placeholder="City"><br>
                </div>
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" id="street" name="street" required placeholder="Street"><br></div>
                <div class="form-group">
                    <label for="house">House:</label>
                    <input type="text" id="house" name="house" required placeholder="House number"><br>
                </div>
                <div class="form-group">
                    <label for="flat">Flat:</label>
                    <input type="text" id="flat" name="flat" placeholder="Flat number"><br>
                </div>
                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input type="text" id="zip" name="zip" required placeholder="Zip code"><br>
                </div>
            </div>
            <p>Go to your preferences <a href="Preferences.php" class="go">Go</a></p>
            <button type="submit">Add Address</button>
        </form>
    </div>
</div>
</body>
</html>
