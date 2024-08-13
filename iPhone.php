<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iKnow</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/iPhone.css">
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
<!--        <button type="button" class="button-Comment"><a href="support.html"><b>Leave your comment</b></a></button>-->
        <button type="button" onclick="location.href='Review.php';" class="button-Comment"><b>Leave your comment</b></button>
    </div>
    <div class="trying">
        <p>Choose iPhone you want to know better.</p>
    </div>
    <div class="iPhone-table">
        <table>
            <tr>
                <td>
                    <img src="image/iPhone/iPhone15ProMax.jpg" alt="none" class="table-photo">
                    <button class="table-text">iPhone 15 Pro Max</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Black Titanium<br>
                                        White Titanium<br>
                                        Blue Titanium<br>
                                        Natural Titanium<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Super Retina XDR display<br>
                                        6.7‑inch (diagonal) all‑screen OLED display<br>
                                        2796‑by‑1290-pixel resolution at 460 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>256GB<br>
                                        512GB<br>
                                        1TB<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 6.29 inches (159.9 mm)<br>
                                        Width: 3.02 inches (76.7 mm)<br>
                                        Depth: 0.32 inch (8.25 mm)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 17, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A17 Pro (3 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.78 GHz + 4x2.11 GHz)<br>
                                        Apple GPU (6-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        48 MP, f/1.8, 24mm (wide)<br>
                                        12 MP, f/2.8, 120mm (periscope telephoto), 1/3.06", 1.12µm, 5x optical zoom<br>
                                        12 MP, f/2.2, 13mm, 120˚ (ultrawide) <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/25/30/60fps, 1080p@25/30/60/120/240fps<br>
                                        Dolby Vision HDR, Cinematic mode (4K@24/30fps) <br>
                                        3D (spatial) video, stereo sound rec
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 4441 mAh, non-removable<br>
                                        Wired, PD2.0, 50% in 30 min (advertised)<br>
                                        15W wireless (MagSafe)<br>
                                        15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/iPhone/iPhone15Pro.jpg" alt="none" class="table-photo">
                    <button class="table-text" data-text="Here will be iPhone 15 Pro characteristics">iPhone 15 Pro</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Black Titanium<br>
                                        White Titanium<br>
                                        Blue Titanium<br>
                                        Natural Titanium<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Super Retina XDR display<br>
                                        6.1‑inch (diagonal) all‑screen OLED display<br>
                                        2556‑by‑1179-pixel resolution at 460 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>128GB<br>
                                        256GB<br>
                                        512GB<br>
                                        1TB<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 5.77 inches (146.6 mm)<br>
                                        Width: 2.78 inches (70.6 mm)<br>
                                        Depth: 0.32 inch (8.25 mm)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1179 x 2556 pixels, 19.5:9 ratio (~461 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 17, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A17 Pro (3 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.78 GHz + 4x2.11 GHz)<br>
                                        Apple GPU (6-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        48 MP, f/1.8, 24mm (wide)<br>
                                        12 MP, f/2.8, 77mm (telephoto), 1/3.5", 1.0µm, 3x optical zoom<br>
                                        12 MP, f/2.2, 13mm, 120˚ (ultrawide) <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/25/30/60fps, 1080p@25/30/60/120/240fps<br>
                                        Dolby Vision HDR (up to 60fps), Cinematic mode (4K@24/30fps) <br>
                                        3D (spatial) video, stereo sound rec
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 3274 mAh, non-removable<br>
                                        Wired, PD2.0, 50% in 30 min (advertised)<br>
                                        15W wireless (MagSafe)<br>
                                        15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/iPhone/iPhone15%20copy.tiff" alt="none" class="table-photo">
                    <button class="table-text" data-text="Here will be iPhone 15 characteristics">iPhone 15</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Black<br>Blue<br>Green<br>Yellow<br>Pink<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Super Retina XDR display<br>6.1‑inch (diagonal) all‑screen OLED display<br>2556‑by‑1179-pixel resolution at 460 ppi</td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>128GB<br>256GB<br>512GB<br></td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 5.81 inches (147.6 mm)<br>
                                        Width: 2.82 inches (71.6 mm)<br>
                                        Depth: 0.31 inch (7.80 mm)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1179 x 2556 pixels, 19.5:9 ratio (~461 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 17, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A16 Bionic (4 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.46 GHz Everest + 4x2.02 GHz Sawtooth)<br>Apple GPU (5-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        48 MP, f/1.6, 26mm (wide)<br>12 MP, f/2.4, 13mm, 120˚ (ultrawide)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/25/30/60fps, 1080p@25/30/60/120/240fps<br>Dolby Vision HDR (up to 60fps), Cinematic mode (4K@30fps), stereo sound rec
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 3349 mAh, non-removable<br>Wired, PD2.0, 50% in 30 min (advertised)<br>15W wireless (MagSafe)<br>15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="image/iPhone/iPhone14ProMax%20copy.tiff" alt="none" class="table-photo">
                    <button class="table-text">iPhone 14 Pro Max</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Space Black<br>Silver<br>Gold<br>Deep Purple<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>
                                        Super Retina XDR display<br>6.7‑inch (diagonal) all‑screen OLED display<br>2796x1290-pixel resolution at 460 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>
                                        128GB<br>256GB<br>512GB<br>1TB<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>
                                        Height: 160.7 mm (6.33 inches)<br>Width: 77.6 mm (3.05 inches)<br>Depth: 7.85 mm (0.31 inches)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Splash, Water and Dust Resistant</td>
                                    <td>
                                        Rated IP68 (maximum depth of 6 metres up to 30 minutes)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 16, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        A16 Bionic chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        6‑core CPU with 2 performance and 4 efficiency cores<br>5‑core GPU
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        48 MP, f/1.8, 24mm (wide)<br>
                                        12 MP, f/2.8, 77mm (telephoto), 3x optical zoom<br>
                                        12 MP, f/2.2, 13mm, 120˚ (ultrawide)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/25/30/60fps, 1080p@25/30/60/120/240fps<br>
                                        Dolby Vision HDR (up to 60fps),  stereo sound rec.<br>Cinematic mode (4K@24/30fps)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 4323 mAh, non-removable (16.68 Wh)<br>
                                        Wired, PD2.0, 50% in 30 min (advertised)<br>
                                        15W wireless (MagSafe)<br>
                                        15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/iPhone/iPhone14Pro.jpg" alt="none" class="table-photo">
                    <button class="table-text">iPhone 14 Pro</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Space Black<br>Silver<br>Gold<br>Deep Purple<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>
                                        Super Retina XDR display<br>6.1‑inch (diagonal) all‑screen OLED display<br>2556‑by‑1179-pixel resolution at 460 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>
                                        128GB<br>256GB<br>512GB<br>1TB<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>
                                        Height: 5.81 inches (147.5 mm)<br>Width: 2.81 inches (71.5 mm)<br>Depth: 7.85 mm (0.31 inches)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1179 x 2556 pixels, 19.5:9 ratio (~460 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 16, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A16 Bionic (4 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.46 GHz Everest + 4x2.02 GHz Sawtooth)<br>Apple GPU (5-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        48 MP, f/1.8, 24mm (wide)<br>
                                        12 MP, f/2.8, 77mm (telephoto), 3x optical zoom<br>
                                        12 MP, f/2.2, 13mm, 120˚ (ultrawide)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/25/30/60fps, 1080p@25/30/60/120/240fps<br>
                                        Dolby Vision HDR (up to 60fps),  stereo sound rec.<br>Cinematic mode (4K@24/30fps)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 3200 mAh, non-removable (12.38 Wh)<br>Wired, PD2.0, 50% in 30 min (advertised)<br>15W wireless (MagSafe)<br>15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/iPhone/iPhone14%20copy.tiff" alt="none" class="table-photo">
                    <button class="table-text" data-text="Here will be iPhone 14characteristics">iPhone 14</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Midnight<br>Starlight<br>Product(red)<br>Blue<br>Purple<br>Yellow<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>
                                        Super Retina XDR display<br>6.1 inches, 90.2 cm2 (~86.0% screen-to-body ratio)<br>2556‑by‑1179-pixel resolution at 460 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>
                                        128GB<br>256GB<br>512GB<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>
                                        Height: 5.78 inches (146.7 mm)<br>Width: 2.81 inches (71.5 mm)<br>Depth: 7.8 mm (0.31 inches)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1170 x 2532 pixels, 19.5:9 ratio (~460 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 16, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A15 Bionic (5 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)<br>Apple GPU (5-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        12 MP, f/1.5, 26mm (wide)<br>12 MP, f/2.4, 13mm, 120˚ (ultrawide)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/25/30/60fps, 1080p@25/30/60/120/240fps<br>
                                        Dolby Vision HDR (up to 60fps),  stereo sound rec.<br>Cinematic mode (4K@30fps)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 3279 mAh, non-removable (12.68 Wh)<br>Wired, PD2.0, 50% in 30 min (advertised)<br>15W wireless (MagSafe)<br>15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="image/iPhone/iPhone13Pro.jpg" alt="none" class="table-photo">
                    <button class="table-text" data-text="Here will be iPhone 13 Pro characteristics">iPhone 13 Pro</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Gold<br>Graphite<br>Green<br>Sierra Blue<br>Silver
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>
                                        Super Retina XDR display with ProMotion<br>6.1‑inch (diagonal) all‑screen OLED display<br>2532‑by‑1170-pixel resolution at 460 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>
                                        128GB<br>256GB<br>512GB<br>1TB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>
                                        Height: 5.78 inches (146.7 mm)<br>Width: 2.82 inches (71.5 mm)<br>Depth: 7.65 mm (0.30 inches)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1170 x 2532 pixels, 19.5:9 ratio (~460 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 15, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A15 Bionic (5 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)<br>Apple GPU (5-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        12 MP, f/1.5, 26mm (wide)<br>12 MP, f/2.8, 77mm (telephoto) <br>12 MP, f/1.8, 13mm, 120˚ (ultrawide)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/30/60fps, 1080p@30/60/120/240fps<br>
                                        Dolby Vision HDR (up to 60fps),  stereo sound rec.<br>Cinematic mode (1080p@30fps)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 3095 mAh, non-removable (12.11 Wh)<br>Wired, PD2.0, 50% in 30 min (advertised)<br>15W wireless (MagSafe)<br>15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/iPhone/iPhone13.png" alt="none" class="table-photo">
                    <button class="table-text" data-text="Here will be iPhone 13 characteristics">iPhone 13</button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Product(red)<br>Starligh<br>Midnight<br>Blue<br>Pink<br>Green
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>
                                        Super Retina XDR display<br>6.1‑inch (diagonal) all‑screen OLED display<br>2532‑by‑1170-pixel resolution at 460 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>
                                        128GB<br>256GB<br>512GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>
                                        Height: 5.78 inches (146.7 mm)<br>Width: 2.82 inches (71.5 mm)<br>Depth: 7.65 mm (0.30 inches)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1170 x 2532 pixels, 19.5:9 ratio (~460 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 15, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A15 Bionic (5 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)<br>Apple GPU (4-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        12 MP, f/1.6, 26mm (wide)<br>12 MP, f/2.4, 120˚, 13mm (ultrawide)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/30/60fps, 1080p@30/60/120/240fps<br>
                                        Dolby Vision HDR (up to 60fps),  stereo sound rec.
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 3240 mAh, non-removable (12.41 Wh)<br>Wired, PD2.0, 50% in 30 min (advertised)<br>15W wireless (MagSafe)<br>15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/iPhone/iPhone13mini%20copy2.tiff" alt="none" class="table-photo">
                    <button class="table-text" data-text="Here will be iPhone 13 mini characteristics">iPhone 13 mini
                    </button>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <table class="modal-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Characteristic</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>(PRODUCT)RED<br>Starligh<br>Midnight<br>Blue<br>Pink<br>Green
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>
                                        Super Retina XDR display<br>5.4‑inch (diagonal) all‑screen OLED display<br>2340‑by‑1080-pixel resolution at 476 ppi
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacity</td>
                                    <td>
                                        128GB<br>256GB<br>512GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>
                                        Height: 5.18 inches (131.5 mm)<br>Width: 2.53 inches (64.2 mm)<br>Depth: 0.30 inch (7.65 mm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resolution</td>
                                    <td>
                                        1080 x 2340 pixels, 19.5:9 ratio (~476 ppi density)
                                    </td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>
                                        iOS 15, upgradable to iOS 17.4
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple A15 Bionic (5 nm)
                                    </td>
                                </tr>
                                <tr>
                                    <td>CPU</td>
                                    <td>
                                        Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)<br>Apple GPU (4-core graphics)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        12 MP, f/1.6, 26mm (wide)<br>12 MP, f/2.4, 120˚, 13mm (ultrawide)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video</td>
                                    <td>
                                        4K@24/30/60fps, 1080p@30/60/120/240fps<br>
                                        Dolby Vision HDR (up to 60fps),  stereo sound rec.
                                    </td>
                                </tr>
                                <tr>
                                    <td>Features</td>
                                    <td>
                                        Face ID, accelerometer, gyro, proximity, compass, barometer
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery</td>
                                    <td>
                                        Li-Ion 2438 mAh, non-removable (9.34 Wh)<br>ired, PD2.0, 50% in 30 min (advertised)<br>15W wireless (MagSafe)<br>15W wireless (Qi2) - requires iOS 17.2 update<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
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
<script src="js/iPhone-main.js"></script>
</body>
</html>
