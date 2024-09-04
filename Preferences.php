<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$user = $_COOKIE['user'];
$addresses = [];
if ($user) {
    $stmt = $mysqli->prepare("SELECT id, country, city, street, house, flat, zip FROM addresses WHERE login = ?");
    $stmt->bind_param('s', $user);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $addresses[] = $row;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=true">
    <title>iKnow</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/preferences-style.css">
    <style>
        .content {
            display: flex;
        }
        .address-list {
            margin-right: 20px;
        }
        .addressForm {
            display: none;
            margin-left: 20px;
        }
        .changePassword {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <div class="all_header_menu">
        <div id="menu-left">
            <ul id="nav">
                <li><a href="iPhone.php">iPhone</a>
                    <ul class="dropdown">
                        <li><a href="iPhone.php">iPhone 15 Pro Max</a></li>
                        <li><a href="iPhone.php">iPhone 15 Pro</a></li>
                        <li><a href="iPhone.php">iPhone 15</a></li>
                        <li><a href="iPhone.php">iPhone 14 Pro Max</a></li>
                        <li><a href="iPhone.php">iPhone 14 Pro</a></li>
                        <li><a href="iPhone.php">iPhone 14</a></li>
                        <li><a href="iPhone.php">iPhone 13 Pro</a></li>
                        <li><a href="iPhone.php">iPhone 13</a></li>
                        <li><a href="iPhone.php">iPhone 13 mini</a></li>
                    </ul>
                </li>
                <li><a href="macBook.php">Mac</a>
                    <ul class="dropdown">
                        <li><a href="macBook.php">Macbook Pro M3</a></li>
                        <li><a href="macBook.php">Macbook Pro M1</a></li>
                        <li><a href="macBook.php">Macbook Air M3</a></li>
                        <li><a href="macBook.php">Macbook Air M2</a></li>
                        <li><a href="macBook.php">Macbook Air M1</a></li>
                        <li><a href="macBook.php">Mac mini</a></li>
                    </ul>
                </li>
                <li><a href="iPad.php">iPad</a>
                    <ul class="dropdown">
                        <li><a href="iPad.php">iPad Pro</a></li>
                        <li><a href="iPad.php">iPad Air</a></li>
                        <li><a href="iPad.php">iPad</a></li>
                        <li><a href="iPad.php">iPad mini</a></li>
                        <li><a href="iPad.php">Apple Pencil</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <a href="index.php" class="iknow">iKnow</a>
        <div id="menu-right">
            <ul id="nav-right">
                <?php if (!isset($_COOKIE['user']) || $_COOKIE['user'] == ''): ?>
                    <li><a href="support.html" class="shop">Shop</a>
                        <ul class="dropdown">
                            <li><a href="iPhoneShop.php">iPhone</a></li>
                            <li><a href="macBookShop.php">MacBook</a></li>
                            <li><a href="iPadShop.php">iPad</a></li>
                        </ul>
                    </li>
                    <li><a href="loginHTML.php" class="login">Login</a></li>
                <?php else: ?>
                    <li><a href="#" class="shop">Shop</a>
                        <ul class="dropdown">
                            <li><a href="iPhoneShop.php">iPhone</a></li>
                            <li><a href="macBookShop.php">MacBook</a></li>
                            <li><a href="iPadShop.php">iPad</a></li>
                        </ul>
                    </li>
                    <li><a class="login" href="#">Hello, <?= htmlspecialchars($_COOKIE['user'])?></a>
                        <ul class="dropdown">
                            <li><a href="logout.php" class="logout">Exit</a></li>
                            <li><a href="Preferences.php" class="preferences">Preferences</a></li>
                            <li><a href="Review.php" class="orders">Support</a></li>
                        </ul>
                    </li>
                    <li><a href="shoppingBasket.php" class="shop">Shopping</a></li>
                <?php endif; ?>
        </div>
    </div>
</header>
<main>
    <div class="Introduction-block">
        <div class="content">
            <?php if (empty($addresses)): ?>
                <p>You don't have any preferable addresses yet, </p><a href="addAddressHTML.php" class="">add one</a>
            <?php else: ?>
                <h2>Your Addresses: </h2><br>
                <ul class="address-list">
                    <?php foreach ($addresses as $address): ?>
                        <table>
                            <tr>
                                <td><b>Country: </b></td>
                                <td><b><?= htmlspecialchars($address['country'])?></b></td>
                            </tr>
                            <tr>
                                <td><b>City: </b> </td>
                                <td><b><?= htmlspecialchars($address['city'])?></b></td>
                            </tr>
                            <tr>
                                <td><b>Street: </b></td>
                                <td><b><?= htmlspecialchars($address['street'])?></b></td>
                            </tr>
                            <tr>
                                <td><b>House: </b> </td>
                                <td><b><?= htmlspecialchars($address['house'])?></b></td>
                            </tr>
                            <tr>
                                <td><b>Flat: </b></td>
                                <td><b><?= htmlspecialchars($address['flat'])?></b></td>
                            </tr>
                            <tr>
                                <td><b>Zip: </b></td>
                                <td><b><?= htmlspecialchars($address['zip'])?></b></td>
                            </tr><br>
                        </table>
                        <a class="deleteButton" href="deleteAddress.php?id=<?= htmlspecialchars($address['id']) ?>">Delete</a>
                    <?php endforeach; ?>
                </ul>
                <?php if (count($addresses) < 2): ?>
                    <a href="addAddressHTML.php" class="addButton">Add</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="changePassword">
        <h2>Change Password: <a href="changePasswordHTML.php">Change password</a></h2>
    </div>
</main>
<footer>
    <div class="lover">
        <h3>Apple lover & wisenheimer</h3>
    </div>
    <div class="aboutme">
        <h3>Frantsysk-Yan Boika</h3>
        <h3>Student of Politechnika Lubelska</h3>
        <h3>yanchik.boika@gmail.com</h3>
    </div>
</footer>
</body>
</html>


