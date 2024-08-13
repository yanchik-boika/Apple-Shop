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
    <link rel="stylesheet" href="css/macBook-style.css">
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
                            <li><a href="Orders.php" class="orders">My orders</a></li>
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
<!--        <button type="button" class="button-Comment"><a href="support.html"><b>Leave your comment</b></a></button>-->
        <button type="button" onclick="location.href='Review.php';" class="button-Comment"><b>Leave your comment</b></button>
    </div>
    <div class="trying">
        <p>Choose macBook you want to know better.</p>
    </div>
    <div class="iPhone-table">
        <table>
            <tr>
                <td>
                    <img src="image/macBook/macBookPro/macBookProM3.jpeg" alt="none" class="table-photo">
                    <button class="table-text">MacBook Pro 16.2" Apple M3 Pro</button>
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
                                    <td>Space Black<br>Silver<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>$2499<br>$2899<br>$3499<br>$3999
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>
                                        Apple M3 Pro chip<br>Apple M3 Max chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Liquid Retina XDR display<br>16.2-inch (diagonal) Liquid Retina XDR display<br>3456-by-2234
                                        native resolution at 254 pixels
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>18GB<br>36Gb<br>48Gb
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery & Power</td>
                                    <td>
                                        Up to 22 hours Apple TV app movie playback<br>
                                        Up to 15 hours wireless web<br>
                                        100-watt-hour lithium-polymer battery<br>
                                        140W USB-C Power Adapter<br>USB-C to MagSafe 3 Cable
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>512GB SSD<br>1TB SSD<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Charging and Expansion</td>
                                    <td>
                                        SDXC card slot<br>HDMI port<br>3.5 mm headphone jack<br>MagSafe 3 port
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video Playback</td>
                                    <td>
                                        Supported formats include HEVC, H.264, AV1, and ProRes
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audio Playback</td>
                                    <td>
                                        Supported formats include AAC, MP3, Apple Lossless, FLAC, Dolby Digital, Dolby
                                        Digital Plus, and Dolby Atmos
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>
                                        Wi-Fi 6E (802.11ax)<br>Bluetooth 5.3
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        1080p FaceTime HD camera
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 0.66 inch (1.68 cm)<br>
                                        Width: 14.01 inches (35.57 cm)<br>
                                        Depth: 9.77 inches (24.81 cm)<br>
                                        Weight (M3 Pro): 4.7 pounds (2.14 kg)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Sonoma
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Closed Captions<br>
                                        Zoom, Siri and Dictation, Text to Speech
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/macBook/macBookPro/macBookProM3.jpeg" alt="none" class="table-photo">
                    <button class="table-text">MacBook Pro 14.2" Apple M3 Pro</button>
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
                                    <td>Space Grey<br>Silver<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>$1599<br>$1999<br>$2399<br>$3199
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M3 chip<br>Apple M3 Pro chip<br>Apple M3 Max chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Liquid Retina XDR display<br>14.2-inch (diagonal) Liquid Retina XDR display<br>3024-by-1964
                                        native resolution at 254 pixels per inch
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>8Gb or 16GB<br>18GB<br>36Gb
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery & Power</td>
                                    <td>
                                        Up to 22 hours Apple TV app movie playback<br>
                                        Up to 15 hours wireless web<br>
                                        70-watt-hour lithium-polymer battery<br>
                                        70W USB-C Power Adapter<br>USB-C to MagSafe 3 Cable
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>512GB SSD<br>1TB SSD<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Charging and Expansion</td>
                                    <td>
                                        SDXC card slot<br>HDMI port<br>3.5 mm headphone jack<br>MagSafe 3 port
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video Playback</td>
                                    <td>
                                        Supported formats include HEVC, H.264, AV1, and ProRes
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audio Playback</td>
                                    <td>
                                        Supported formats include AAC, MP3, Apple Lossless, FLAC, Dolby Digital, Dolby
                                        Digital Plus, and Dolby Atmos
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>
                                        Wi-Fi 6E (802.11ax)<br>Bluetooth 5.3
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        1080p FaceTime HD camera
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 0.61 inch (1.55 cm)<br>
                                        Width: 12.31 inches (31.26 cm)<br>
                                        Depth: 8.71 inches (22.12 cm)<br>
                                        Weight (M3): 3.4 pounds (1.55 kg)<br>
                                        Weight (M3 Pro): 3.5 pounds (1.61 kg)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Sonoma
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Closed Captions<br>
                                        Zoom, Siri and Dictation, Text to Speech
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/macBook/macBookPro/macBookProM1.png" alt="none" class="table-photo">
                    <button class="upgrade">MacBook Pro 16.2" Apple M1 Pro</button>
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
                                    <td>Space Grey<br>Silver<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M1 Pro chip<br>Apple M1 Max chip<br>Apple M3 Max chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Liquid Retina XDR display<br>6.2-inch (diagonal) Liquid Retina XDR display<br>3456-by-2234
                                        native resolution at 254 pixels per inch
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>16GB<br>32Gb
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery & Power</td>
                                    <td>
                                        Up to 21 hours Apple TV app movie playback<br>
                                        Up to 14 hours wireless web<br>
                                        100-watt-hour lithium-polymer battery<br>
                                        140W USB-C Power Adapter<br>USB-C to MagSafe 3 Cable
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>512GB SSD<br>1TB SSD<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Charging and Expansion</td>
                                    <td>
                                        SDXC card slot<br>HDMI port<br>3.5 mm headphone jack<br>MagSafe 3 port
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video Playback</td>
                                    <td>
                                        Supported formats include HEVC, H.264, and ProRes
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audio Playback</td>
                                    <td>
                                        Supported formats include AAC, MP3, Apple Lossless, FLAC, Dolby Digital, Dolby
                                        Digital Plus, and Dolby Atmos
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>
                                        802.11ax Wi-Fi 6 wireless networking<br>Bluetooth 5.0
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        1080p FaceTime HD camera
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 0.66 inch (1.68 cm)<br>
                                        Width: 14.01 inches (35.57 cm)<br>
                                        Depth: 9.77 inches (24.81 cm)<br>
                                        Weight (M1 Pro): 4.7 pounds (2.1 kg)<br>
                                        Weight (M1 Max): 4.8 pounds (2.2 kg)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Ventura
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Live Captions<br>
                                        Zoom, Siri and Dictation
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
                    <img src="image/macBook/macBookPro/macBookProM1.png" alt="none" class="table-photo">
                    <button class="upgrade">MacBook Pro 14.2" Apple M1 Pro</button>
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
                                    <td>Space Grey<br>Silver<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M1 Pro chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Liquid Retina XDR display<br>14.2-inch (diagonal) Liquid Retina XDR display<br>3024-by-1964
                                        native resolution at 254 pixels per inch
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>16GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery & Power</td>
                                    <td>
                                        Up to 17 hours Apple TV app movie playback<br>
                                        Up to 11 hours wireless web<br>
                                        70-watt-hour lithium-polymer battery<br>
                                        67W USB-C Power Adapter <br>USB-C to MagSafe 3 Cable
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>512GB SSD
                                    </td>
                                </tr>
                                <tr>
                                    <td>Charging and Expansion</td>
                                    <td>
                                        SDXC card slot<br>HDMI port<br>3.5 mm headphone jack<br>MagSafe 3 port
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video Playback</td>
                                    <td>
                                        Supported formats include HEVC, H.264, and ProRes
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audio Playback</td>
                                    <td>
                                        Supported formats include AAC, MP3, Apple Lossless, FLAC, Dolby Digital, Dolby
                                        Digital Plus, and Dolby Atmos
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>
                                        802.11ax Wi-Fi 6 wireless networking<br>Bluetooth 5.0
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        1080p FaceTime HD camera
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 0.61 inch (1.55 cm)<br>
                                        Width: 12.31 inches (31.26 cm)<br>
                                        Depth: 8.71 inches (22.12 cm)<br>
                                        Weight: 3.5 pounds (1.6 kg)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Ventura
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Live Captions<br>
                                        Zoom, Siri and Dictation
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/macBook/macBookAir/MacBookAir.webp" alt="none" class="table-photo">
                    <button class="table-text">MacBook Air 15.3" Apple M2</button>
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
                                    <td>Starlight<br>Silver<br>Space Grey<br>Midnight
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M2 chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Liquid Retina display<br>15.3-inch (diagonal) LED-backlit display with IPS
                                        technology<br>2880-by-1864 native resolution at 224 pixels per inch 500 nits
                                        brightness
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>8GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery & Power</td>
                                    <td>
                                        Up to 18 hours Apple TV app movie playback<br>
                                        Up to 15 hours wireless web<br>
                                        66.5-watt‑hour lithium‑polymer battery<br>
                                        35W Dual USB-C Port Compact Power Adapter<br>USB-C to MagSafe 3 Cable
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>256GB SSD
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video Playback</td>
                                    <td>
                                        Supported formats include HEVC, H.264, and ProRes
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audio Playback</td>
                                    <td>
                                        Supported formats include AAC, MP3, Apple Lossless, FLAC, Dolby Digital, Dolby
                                        Digital Plus, and Dolby Atmos
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>
                                        Wi-Fi 6 (802.11ax)<br>Bluetooth 5.3
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        1080p FaceTime HD camera
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 0.45 inch (1.15 cm)<br>
                                        Width: 13.40 inches (34.04 cm)<br>
                                        Depth: 9.35 inches (23.76 cm)<br>
                                        Weight: 3.3 pounds (1.51 kg)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Sonoma
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Live Captions<br>
                                        Zoom, Siri and Dictation
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/macBook/macBookAir/macBookAirM3.jpeg" alt="none" class="table-photo">
                    <button class="table-text">MacBook Air 13.6" Apple M3</button>
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
                                    <td>Starlight<br>Silver<br>Space Grey<br>Midnight
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>$999<br>$1099<br>$1299<br>$1499
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M3 chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Liquid Retina display<br>13.6-inch (diagonal) LED-backlit display with IPS
                                        technology<br>2560-by-1664 native resolution at 224 pixels per inch 500 nits
                                        brightness
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>8GB<br>16GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery & Power</td>
                                    <td>
                                        Up to 18 hours Apple TV app movie playback<br>
                                        Up to 15 hours wireless web<br>
                                        52.6-watt‑hour lithium‑polymer battery<br>
                                        30W Dual USB-C Port Compact Power Adapter<br>USB-C to MagSafe 3 Cable
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>256GB SSD<br>512GB SSD<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Charging and Expansion</td>
                                    <td>
                                        MagSafe 3 charging port<br>3.5 mm headphone jack<br>Two Thunderbolt / USB 4
                                        ports
                                    </td>
                                </tr>
                                <tr>
                                    <td>Video Playback</td>
                                    <td>
                                        Supported formats include HEVC, H.264, AV1, and ProRes
                                    </td>
                                </tr>

                                <tr>
                                    <td>Audio Playback</td>
                                    <td>
                                        Supported formats include AAC, MP3, Apple Lossless, FLAC, Dolby Digital, Dolby
                                        Digital Plus, and Dolby Atmos
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>
                                        Wi-Fi 6E (802.11ax)<br>Bluetooth 5.3
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        1080p FaceTime HD camera
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 0.44 inch (1.13 cm)<br>
                                        Width: 11.97 inches (30.41 cm)<br>
                                        Depth: 8.46 inches (21.5 cm)<br>
                                        Weight: 2.7 pounds (1.24 kg)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Sonoma
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Live Captions<br>
                                        Zoom, Siri and Dictation
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
                    <img src="image/macBook/macBookAir/macBookAirM1.jpeg" alt="none" class="table-photo">
                    <button class="table-text">MacBook Air 13" Apple M1</button>
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
                                    <td>Gold<br>Silver<br>Space Grey
                                    </td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>2020</td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M1 chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>Retina display<br>13.3-inch (diagonal) LED-backlit display with IPS
                                        technology<br>2560-by-1600
                                        native resolution at 227 pixels
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>8GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buttery & Power</td>
                                    <td>
                                        Up to 18 hours Apple TV app movie playback<br>
                                        Up to 15 hours wireless web<br>
                                        Built-in 49.9‑watt‑hour lithium‑polymer battery<br>
                                        30W USB-C Power Adapter
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>256GB SSD
                                    </td>
                                </tr>
                                <tr>
                                    <td>Charging and Expansion</td>
                                    <td>
                                        Thunderbolt 3 (up to 40Gb/s)<br>3.5 mm headphone jack<br>USB 4 (up to 40Gb/s)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Touch ID</td>
                                    <td>
                                        Touch ID sensor
                                    </td>
                                </tr>

                                <tr>
                                    <td>Audio</td>
                                    <td>
                                        Stereo speakers, Wide stereo sound, Support for Dolby Atmos playback
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>
                                        802.11ax Wi-Fi 6 wireless networking<br>Bluetooth 5.0
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>
                                        720p FaceTime HD camera
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 0.16–0.63 inch (0.41–1.61 cm)<br>
                                        Width: 11.97 inches (30.41 cm)<br>
                                        Depth: 8.36 inches (21.24 cm)<br>
                                        Weight: 2.8 pounds (1.29 kg)<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Ventura
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Live Captions<br>
                                        Zoom, Siri and Dictation
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/macBook/macMini/macMini1.jpeg" alt="none" class="table-photo">
                    <button class="table-text">Mac Mini, Apple M2</button>
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
                                    <td>Silver
                                    </td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>2023</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>
                                        $599<br>$799<br>$1299
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M2 chip<br>Apple M2 Pro chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>8GB<br>16GB
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>256GB SSD<br>512GB SSD
                                    </td>
                                </tr>
                                <tr>
                                    <td>Connections and Expansion</td>
                                    <td>
                                        DisplayPort, Thunderbolt 4 (up to 40Gb/s)<br>USB 4 (up to 40Gb/s), USB 3.1 Gen 2
                                        (up
                                        to 10Gb/s)<br>Gigabit Ethernet port, 3.5 mm headphone jack
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audio</td>
                                    <td>
                                        Stereo speakers, Wide stereo sound, Support for Dolby Atmos playback
                                    </td>
                                </tr>
                                <tr>
                                    <td>Communications</td>
                                    <td>
                                        Wi-Fi 6E (802.11ax)<br>Bluetooth 5.3
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 1.41 inches (3.58 cm)<br>
                                        Width: 7.75 inches (19.70 cm)<br>
                                        Depth: 7.75 inches (19.70 cm)<br>
                                        Weight (M2): 2.6 pounds (1.18 kg)<br>
                                        Weight (M2 Pro): 2.8 pounds (1.28 kg)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Sonoma
                                    </td>
                                </tr>
                                <tr>
                                    <td>In the box</td>
                                    <td>
                                        Mac mini<br>Power cord
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Closed Captions<br>
                                        Zoom, Siri and Dictation, Text to Speech
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td>
                    <img src="image/macBook/macMini/macMini1.jpeg" alt="none" class="table-photo">
                    <button class="table-text">Mac Mini, Apple M1</button>
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
                                    <td>Silver
                                    </td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>2020</td>
                                </tr>
                                <tr>
                                    <td>Chip</td>
                                    <td>
                                        Apple M1 chip
                                    </td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>8GB</td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>256GB SSD</td>
                                </tr>
                                <tr>
                                    <td>Video support</td>
                                    <td>
                                        Simultaneously supports up to two displays<br>Thunderbolt 3 digital video output
                                        supports<br>HDMI display video output
                                    </td>
                                </tr>
                                <tr>
                                    <td>Connections and Expansion</td>
                                    <td>
                                        Two Thunderbolt / USB 4 ports<br>Two USB-A ports (up to 5 Gb/s), HDMI port<br>Gigabit
                                        Ethernet port, 3.5 mm headphone jack
                                    </td>
                                </tr>
                                <tr>
                                    <td>Audio</td>
                                    <td>
                                        Built-in speaker<br>3.5 mm headphone jack<br>HDMI port supports multichannel
                                        audio
                                        output
                                    </td>
                                </tr>
                                <tr>
                                    <td>Communications</td>
                                    <td>
                                        Wi-Fi 6E (802.11ax)<br>Bluetooth 5.0
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size and Weight</td>
                                    <td>Height: 1.4 inches (3.6 cm)<br>
                                        Width: 7.7 inches (19.7 cm)<br>
                                        Depth: 7.7 inches (19.7 cm)<br>
                                        Weight: 2.6 pounds (1.2 kg)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td>
                                        macOS Ventura
                                    </td>
                                </tr>
                                <tr>
                                    <td>In the box</td>
                                    <td>
                                        Mac mini<br>Power cord
                                    </td>
                                </tr>
                                <tr>
                                    <td>Accessibility</td>
                                    <td>
                                        Voice Control, Increase Contrast, Switch Control<br>
                                        VoiceOver, Reduce Motion, Closed Captions<br>
                                        Zoom, Siri and Dictation
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
