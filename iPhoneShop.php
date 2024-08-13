<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch iPhone data from the catalog
$result = $mysqli->query("SELECT * FROM catalogShop WHERE category = 'iPhone'");
$iphones = $result->fetch_all(MYSQLI_ASSOC);

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
        <link rel="stylesheet" href="css/iPhoneShop-style.css">
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
            <img src="image/iPhone/iPhoneFirstImage1.png" alt="none" id="main-photo">
            <h3>iPhone</h3>
            <button type="button" onclick="location.href='support.html';" class="button-Comment"><b>Leave your comment</b></button>
        </div>
        <div class="trying">
            <p>Choose iPhone you want to buy.</p>
        </div>
        <div class="iPhone-table">
            <table>
                <?php foreach ($iphones as $i => $iphone): ?>
                    <?php if ($i % 3 === 0): ?>
                        <tr>
                    <?php endif; ?>
                    <td>
                        <img src="image/iPhone1/<?= htmlspecialchars($iphone['image']) ?>" alt="none" class="table-photo<?= $i+1 ?>">
                        <button class="table-text<?= $i+1 ?>"><?= htmlspecialchars($iphone['name']) ?></button><br>
                        <a href="<?= $isUserLoggedIn ? "buyItemHTML.php?id={$iphone['id']}" : "loginHTML.php" ?>" class="buyNow<?= $i+1 ?>">Buy now</a>
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
$mysqli->close();
?>



<?php
//session_start();
//$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
//if ($mysqli->connect_error) {
//    die("Connection failed: " . $mysqli->connect_error);
//}
//
//// Fetch iPhone data from the catalog
//$result = $mysqli->query("SELECT * FROM catalogShop WHERE category = 'iPhone'");
//$iphones = $result->fetch_all(MYSQLI_ASSOC);
//?>
<!--    <!DOCTYPE html>-->
<!--    <html lang="en">-->
<!--    <head>-->
<!--        <meta charset="UTF-8">-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--        <title>iKnow</title>-->
<!--        <link rel="stylesheet" href="css/style.css">-->
<!--        <link rel="stylesheet" href="css/iPhoneShop-style.css">-->
<!--    </head>-->
<!--    <body>-->
<!--    <header>-->
<!--        <div class="all_header_menu">-->
<!--            <div id="menu-left">-->
<!--                <ul id="nav">-->
<!--                    <li><a href="iPhone.php">iPhone</a>-->
<!--                        <ul class="dropdown">-->
<!--                            <li><a href="iPhone.php">iPhone 15 Pro Max</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 15 Pro</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 15</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 14 Pro Max</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 14 Pro</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 14</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 13 Pro</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 13</a></li>-->
<!--                            <li><a href="iPhone.php">iPhone 13 mini</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a href="macBook.php">Mac</a>-->
<!--                        <ul class="dropdown">-->
<!--                            <li><a href="macBook.php">Macbook Pro M3</a></li>-->
<!--                            <li><a href="macBook.php">Macbook Pro M1</a></li>-->
<!--                            <li><a href="macBook.php">Macbook Air M3</a></li>-->
<!--                            <li><a href="macBook.php">Macbook Air M2</a></li>-->
<!--                            <li><a href="macBook.php">Macbook Air M1</a></li>-->
<!--                            <li><a href="macBook.php">Mac mini</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a href="iPad.php">iPad</a>-->
<!--                        <ul class="dropdown">-->
<!--                            <li><a href="iPad.php">iPad Pro</a></li>-->
<!--                            <li><a href="iPad.php">iPad Air</a></li>-->
<!--                            <li><a href="iPad.php">iPad</a></li>-->
<!--                            <li><a href="iPad.php">iPad mini</a></li>-->
<!--                            <li><a href="iPad.php">Apple Pencil</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <a href="index.php" class="iknow">iKnow</a>-->
<!--            <div id="menu-right">-->
<!--                <ul id="nav-right">-->
<!--                    --><?php //if (!isset($_COOKIE['user']) || $_COOKIE['user'] == ''): ?>
<!--                        <li><a href="support.html" class="shop">Shop</a>-->
<!--                            <ul class="dropdown">-->
<!--                                <li><a href="iPhoneShop.php">iPhone</a></li>-->
<!--                                <li><a href="macBookShop.php">MacBook</a></li>-->
<!--                                <li><a href="iPadShop.php">iPad</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="loginHTML.php" class="login">Login</a></li>-->
<!--                    --><?php //else: ?>
<!--                        <li><a href="#" class="shop">Shop</a>-->
<!--                            <ul class="dropdown">-->
<!--                                <li><a href="iPhoneShop.php">iPhone</a></li>-->
<!--                                <li><a href="macBookShop.php">MacBook</a></li>-->
<!--                                <li><a href="iPadShop.php">iPad</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a class="login" href="#">Hello, --><?php //= htmlspecialchars($_COOKIE['user'])?><!--</a>-->
<!--                            <ul class="dropdown">-->
<!--                                <li><a href="logout.php" class="logout">Exit</a></li>-->
<!--                                <li><a href="Preferences.php" class="preferences">Preferences</a></li>-->
<!--                                <li><a href="Orders.php" class="orders">My orders</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="shoppingBasket.php" class="shop">Shopping</a></li>-->
<!--                    --><?php //endif; ?>
<!--            </div>-->
<!--        </div>-->
<!--    </header>-->
<!--    <main>-->
<!--        <div class="iPhone-first-block">-->
<!--            <img src="image/iPhone/iPhoneFirstImage1.png" alt="none" id="main-photo">-->
<!--            <h3>iPhone</h3>-->
<!--            <button type="button" onclick="location.href='support.html';" class="button-Comment"><b>Leave your comment</b></button>-->
<!--        </div>-->
<!--        <div class="trying">-->
<!--            <p>Choose iPhone you want to buy.</p>-->
<!--        </div>-->
<!--        <div class="iPhone-table">-->
<!--            <table>-->
<!--                --><?php //foreach ($iphones as $i => $iphone): ?>
<!--                    --><?php //if ($i % 3 === 0): ?>
<!--                        <tr>-->
<!--                    --><?php //endif; ?>
<!--                    <td>-->
<!--                        <img src="image/iPhone1/--><?php //= htmlspecialchars($iphone['image']) ?><!--" alt="none" class="table-photo--><?php //= $i+1 ?><!--">-->
<!--                        <button class="table-text--><?php //= $i+1 ?><!--">--><?php //= htmlspecialchars($iphone['name']) ?><!--</button><br>-->
<!--                        <a href="buyItemHTML.php?id=--><?php //= $iphone['id'] ?><!--" class="buyNow--><?php //= $i+1 ?><!--">Buy now</a>-->
<!--                    </td>-->
<!--                    --><?php //if ($i % 3 === 2): ?>
<!--                        </tr>-->
<!--                    --><?php //endif; ?>
<!--                --><?php //endforeach; ?>
<!--            </table>-->
<!--        </div>-->
<!--    </main>-->
<!--    <footer>-->
<!--        <div class="lover">-->
<!--            <h3>Apple lover & wisenheimer</h3>-->
<!--        </div>-->
<!--        <div class="aboutme">-->
<!--            <h3>Frantsysk-Yan Boika</h3>-->
<!--            <h3>Student of Politechnika Lubelska</h3>-->
<!--            <h3>yanchik.boika@gmail.com</h3>-->
<!--        </div>-->
<!--    </footer>-->
<!--    <script src="js/iPhone-main.js"></script>-->
<!--    </body>-->
<!--    </html>-->
<?php
//$mysqli->close();
//?>