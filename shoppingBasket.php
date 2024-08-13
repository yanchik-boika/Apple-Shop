<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch the current user's orders
$user = $_COOKIE['user'];
$stmt = $mysqli->prepare("SELECT o.item, o.storage, o.color, o.price, i.image FROM iPhoneOrders o JOIN sliderPhotos i ON o.item = i.itemName WHERE o.user = ? AND o.color = i.color AND i.image LIKE '%1.%'");
$stmt->bind_param('s', $user);
$stmt->execute();
$result = $stmt->get_result();
$orders = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Calculate total cost
$totalCost = array_sum(array_column($orders, 'price'));

$discount = 0;
$errorMessage = "";

// Check if a promo code was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promocode'])) {
    $promoCode = $_POST['promocode'];
    $stmt = $mysqli->prepare("SELECT discount FROM promocode WHERE promocode = ?");
    $stmt->bind_param('s', $promoCode);
    $stmt->execute();
    $result = $stmt->get_result();
    $promo = $result->fetch_assoc();
    $stmt->close();

    if ($promo) {
        $discount = $promo['discount'];
    } else {
        $errorMessage = "Invalid promo code.";
    }
}

$totalCostWithPromo = $totalCost - $discount;
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/basket-style.css">
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
    <h2>Shopping Cart</h2>
    <div class="cart-container">
        <div class="cart-items">
            <?php if (empty($orders)): ?>
                <p>Your basket is empty.</p>
            <?php else: ?>
                <?php foreach ($orders as $order): ?>
                    <div class="cart-item">
                        <img src="image/slider1/<?=htmlspecialchars($order['image'])?>" alt="<?= htmlspecialchars($order['item']) ?>" class="item-image">
                        <div class="item-details">
                            <h3><?= htmlspecialchars($order['item']) ?></h3>
                            <p>Storage: <?= htmlspecialchars($order['storage']) ?></p>
                            <p>Color: <?= htmlspecialchars($order['color']) ?></p>
                            <p>Price: $<?= htmlspecialchars($order['price']) ?></p>
                            <form action="deleteFromCart.php" method="POST" class="delete-form">
                                <input type="hidden" name="item" value="<?= htmlspecialchars($order['item']) ?>">
                                <input type="hidden" name="storage" value="<?= htmlspecialchars($order['storage']) ?>">
                                <input type="hidden" name="color" value="<?= htmlspecialchars($order['color']) ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="cart-summary">
            <h3>Promo Code</h3>
            <form action="shoppingBasket.php" method="POST" class="promocode-Form">
                <input type="text" name="promocode" placeholder="Enter promo code">
                <button type="submit">Apply</button>
            </form>
            <?php if ($errorMessage): ?>
                <p class="error"><?= $errorMessage ?></p>
            <?php endif; ?>
            <h3>Cart Summary</h3>
            <p>Subtotal: $<?= $totalCost ?></p>
            <p>Free Shipping Promo: -$9.99</p>
            <p>Discount: $<?= $discount ?></p>
            <p>Total Cost: $<?= $totalCostWithPromo -9.99?></p>

            <a href="checkout.php" class="checkout-button">Checkout</a>
        </div>
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



















<?php
//session_start();
//$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
//if ($mysqli->connect_error) {
//    die("Connection failed: " . $mysqli->connect_error);
//}
//
//// Fetch the current user's orders
//$user = $_COOKIE['user'];
//$stmt = $mysqli->prepare("SELECT o.item, o.storage, o.color, o.price, i.image FROM iPhoneOrders o JOIN image i ON o.item = i.itemName WHERE o.user = ?");
//$stmt->bind_param('s', $user);
//$stmt->execute();
//$result = $stmt->get_result();
//$orders = $result->fetch_all(MYSQLI_ASSOC);
//$stmt->close();
//
//// Calculate total cost
//$totalCost = array_sum(array_column($orders, 'price'));
//
//$discount = 0;
//$errorMessage = "";
//
//// Check if a promo code was submitted
//if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promocode'])) {
//    $promoCode = $_POST['promocode'];
//    $stmt = $mysqli->prepare("SELECT discount FROM promocode WHERE promocode = ?");
//    $stmt->bind_param('s', $promoCode);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $promo = $result->fetch_assoc();
//    $stmt->close();
//
//    if ($promo) {
//        $discount = $promo['discount'];
//    } else {
//        $errorMessage = "Invalid promo code.";
//    }
//}
//
//$totalCostWithPromo = $totalCost - $discount;
//$mysqli->close();
//?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Shopping Cart</title>-->
<!--    <link rel="stylesheet" href="css/style.css">-->
<!--    <link rel="stylesheet" href="css/basket-style.css">-->
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
<!--    <h2>Shopping Cart</h2>-->
<!--    <div class="cart-container">-->
<!--        <div class="cart-items">-->
<!--            --><?php //if (empty($orders)): ?>
<!--                <p>Your basket is empty.</p>-->
<!--            --><?php //else: ?>
<!--                --><?php //foreach ($orders as $order): ?>
<!--                    <div class="cart-item">-->
<!--                        <img src="image/orders/--><?php //= htmlspecialchars($order['image']) ?><!--" alt="--><?php //= htmlspecialchars($order['item']) ?><!--" class="item-image">-->
<!--                        <div class="item-details">-->
<!--                            <h3>--><?php //= htmlspecialchars($order['item']) ?><!--</h3>-->
<!--                            <p>Storage: --><?php //= htmlspecialchars($order['storage']) ?><!--</p>-->
<!--                            <p>Color: --><?php //= htmlspecialchars($order['color']) ?><!--</p>-->
<!--                            <p>Price: $--><?php //= htmlspecialchars($order['price']) ?><!--</p>-->
<!--                            <form action="deleteFromCart.php" method="POST" class="delete-form">-->
<!--                                <input type="hidden" name="item" value="--><?php //= htmlspecialchars($order['item']) ?><!--">-->
<!--                                <input type="hidden" name="storage" value="--><?php //= htmlspecialchars($order['storage']) ?><!--">-->
<!--                                <input type="hidden" name="color" value="--><?php //= htmlspecialchars($order['color']) ?><!--">-->
<!--                                <button type="submit">Delete</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
<!--            --><?php //endif; ?>
<!--        </div>-->
<!--        <div class="cart-summary">-->
<!--            <h3>Promo Code</h3>-->
<!--            <form action="shoppingBasket.php" method="POST" class="promocode-Form">-->
<!--                <input type="text" name="promocode" placeholder="Enter promo code">-->
<!--                <button type="submit">Apply</button>-->
<!--            </form>-->
<!--            --><?php //if ($errorMessage): ?>
<!--                <p class="error">--><?php //= $errorMessage ?><!--</p>-->
<!--            --><?php //endif; ?>
<!--            <h3>Cart Summary</h3>-->
<!--            <p>Subtotal: $--><?php //= $totalCost ?><!--</p>-->
<!--            <p>Free Shipping Promo: -$9.99</p>-->
<!--            <p>Discount: $--><?php //= $discount ?><!--</p>-->
<!--            <p>Total Cost: $--><?php //= $totalCostWithPromo -9.99?><!--</p>-->
<!---->
<!--            <a href="checkout.php" class="checkout-button">Checkout</a>-->
<!--        </div>-->
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
<!--</body>-->
<!--</html>-->
<!---->
