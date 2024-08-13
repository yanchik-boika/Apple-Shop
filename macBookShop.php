<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch iPhone data from the catalog
$result = $mysqli->query("SELECT * FROM catalogShop WHERE category = 'macbook'");
$ipads = $result->fetch_all(MYSQLI_ASSOC);

// Determine if user is logged in
$isUserLoggedIn = isset($_COOKIE['user']) && $_COOKIE['user'] != '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iKnow</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/macBookShop-style.css">
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
    <div class="iPhone-first-block">
        <img src="image/macBook/macBook-firstImage2.jpg" alt="none" id="main-photo">
        <h3>MacBook Pro</h3>
        <button type="button" onclick="location.href='Review.php';" class="button-Comment"><b>Leave your comment</b></button>
    </div>
    <div class="trying">
        <p>Choose macBook you want to buy.</p>
    </div>
    <div class="iPhone-table">
        <table>
            <?php foreach ($ipads as $i => $ipad): ?>
                <?php if ($i % 3 === 0): ?>
                    <tr>
                <?php endif; ?>
                <td>
                    <img src="image/macbook1/<?= htmlspecialchars($ipad['image']) ?>" alt="none" class="table-photo">
                    <button class="button"><?= htmlspecialchars($ipad['name']) ?></button><br>
                    <a href="<?= $isUserLoggedIn ? "buyMacBookHTML.php?id={$ipad['id']}" : "loginHTML.php" ?>" class="buyNow1">Buy now</a>
                </td>
                <?php if ($i % 3 === 2): ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
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
<script>
    document.querySelectorAll('.button').forEach(button => {
        button.addEventListener('click', function() {
            const userLoggedIn = <?= json_encode($isUserLoggedIn) ?>;
            const url = this.nextElementSibling.getAttribute('href');
            if (!userLoggedIn) {
                window.location.href = 'loginHTML.php';
            } else {
                window.location.href = url;
            }
        });
    });
</script>
<script src="js/iPhone-main.js"></script>
</body>
</html>




<?php
//session_start();
//$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
//if ($mysqli->connect_error) {
//    die("Connection failed: " . $mysqli->connect_error);
//}
//
//// Fetch iPhone data from the catalog
//$result = $mysqli->query("SELECT * FROM catalogShop WHERE category = 'macbook'");
//$ipads = $result->fetch_all(MYSQLI_ASSOC);
//?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>iKnow</title>-->
<!--    <link rel="stylesheet" href="css/style.css">-->
<!--    <link rel="stylesheet" href="css/macBookShop-style.css">-->
<!--</head>-->
<!--<body>-->
<!--<header>-->
<!--    <div class="all_header_menu">-->
<!--        <div id="menu-left">-->
<!--            <ul id="nav">-->
<!--                <li><a href="iPhone.php">iPhone</a>-->
<!--                    <ul class="dropdown">-->
<!--                        <li><a href="iPhone.php">iPhone 15 Pro Max</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 15 Pro</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 15</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 14 Pro Max</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 14 Pro</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 14</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 13 Pro</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 13</a></li>-->
<!--                        <li><a href="iPhone.php">iPhone 13 mini</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li><a href="macBook.php">Mac</a>-->
<!--                    <ul class="dropdown">-->
<!--                        <li><a href="macBook.php">Macbook Pro M3</a></li>-->
<!--                        <li><a href="macBook.php">Macbook Pro M1</a></li>-->
<!--                        <li><a href="macBook.php">Macbook Air M3</a></li>-->
<!--                        <li><a href="macBook.php">Macbook Air M2</a></li>-->
<!--                        <li><a href="macBook.php">Macbook Air M1</a></li>-->
<!--                        <li><a href="macBook.php">Mac mini</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li><a href="iPad.php">iPad</a>-->
<!--                    <ul class="dropdown">-->
<!--                        <li><a href="iPad.php">iPad Pro</a></li>-->
<!--                        <li><a href="iPad.php">iPad Air</a></li>-->
<!--                        <li><a href="iPad.php">iPad</a></li>-->
<!--                        <li><a href="iPad.php">iPad mini</a></li>-->
<!--                        <li><a href="iPad.php">Apple Pencil</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <a href="index.php" class="iknow">iKnow</a>-->
<!--        <div id="menu-right">-->
<!--            <ul id="nav-right">-->
<!--                --><?php //if (!isset($_COOKIE['user']) || $_COOKIE['user'] == ''): ?>
<!--                    <li><a href="support.html" class="shop">Shop</a>-->
<!--                        <ul class="dropdown">-->
<!--                            <li><a href="iPhoneShop.php">iPhone</a></li>-->
<!--                            <li><a href="macBookShop.php">MacBook</a></li>-->
<!--                            <li><a href="iPadShop.php">iPad</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a href="loginHTML.php" class="login">Login</a></li>-->
<!--                --><?php //else: ?>
<!--                    <li><a href="#" class="shop">Shop</a>-->
<!--                        <ul class="dropdown">-->
<!--                            <li><a href="iPhoneShop.php">iPhone</a></li>-->
<!--                            <li><a href="macBookShop.php">MacBook</a></li>-->
<!--                            <li><a href="iPadShop.php">iPad</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a class="login" href="#">Hello, --><?php //= htmlspecialchars($_COOKIE['user'])?><!--</a>-->
<!--                        <ul class="dropdown">-->
<!--                            <li><a href="logout.php" class="logout">Exit</a></li>-->
<!--                            <li><a href="Preferences.php" class="preferences">Preferences</a></li>-->
<!--                            <li><a href="Orders.php" class="orders">My orders</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a href="shoppingBasket.php" class="shop">Shopping</a></li>-->
<!--                --><?php //endif; ?>
<!--        </div>-->
<!--    </div>-->
<!--</header>-->
<!--<main>-->
<!--    <div class="iPhone-first-block">-->
<!--        <img src="image/macBook/macBook-firstImage2.jpg" alt="none" id="main-photo">-->
<!--        <h3>MacBook Pro</h3>-->
<!--        <button type="button" onclick="location.href='Review.php';" class="button-Comment"><b>Leave your comment</b></button>-->
<!--    </div>-->
<!--    <div class="trying">-->
<!--        <p>Choose macBook you want to buy.</p>-->
<!--    </div>-->
<!--    <div class="iPhone-table">-->
<!--        <table>-->
<!--            --><?php //foreach ($ipads as $i => $ipad): ?>
<!--                --><?php //if ($i % 3 === 0): ?>
<!--                    <tr>-->
<!--                --><?php //endif; ?>
<!--                <td>-->
<!--                    <img src="image/macbook1/--><?php //= htmlspecialchars($ipad['image']) ?><!--" alt="none" class="table-photo">-->
<!--                    <button class="buttton">--><?php //= htmlspecialchars($ipad['name']) ?><!--</button><br>-->
<!--                    <a href="buyMacBookHTML.php?id=--><?php //= $ipad['id'] ?><!--" class="buyNow1">Buy now</a>-->
<!--                </td>-->
<!--                --><?php //if ($i % 3 === 2): ?>
<!--                    </tr>-->
<!--                --><?php //endif; ?>
<!--            --><?php //endforeach; ?>
<!--        </table>-->
<!--    </div>-->
<!--</main>-->
<!--<footer>-->
<!--    <div class="lover">-->
<!--        <h3>Apple lover & wisenheimer</h3>-->
<!--    </div>-->
<!--    <div class="aboutme">-->
<!--        <h3>Frantsysk-Yan Boika</h3>-->
<!--        <h3>Student of Politechnika Lubelska</h3>-->
<!--        <h3>yanchik.boika@gmail.com</h3>-->
<!--    </div>-->
<!--</footer>-->
<!--<script>-->
<!--    document.querySelectorAll('.button').forEach(button => {-->
<!--        button.addEventListener('click', function() {-->
<!--            const userLoggedIn = --><?php //= isset($_COOKIE['user']) && $_COOKIE['user'] != '' ? 'true' : 'false' ?>////;
<!--//            if (userLoggedIn) {-->
<!--//                window.location.href = this.getAttribute('data-url');-->
<!--//            } else {-->
<!--//                window.location.href = 'loginHtml.php';-->
<!--//            }-->
<!--//        });-->
<!--//    });-->
<!--//</script>-->
<!--//<script src="js/iPhone-main.js"></script>-->
<!--//</body>-->
<!--//</html>-->