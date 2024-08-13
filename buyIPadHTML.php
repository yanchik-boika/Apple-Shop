<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_GET['id'])) {
    die("No iPad selected.");
}

$id = intval($_GET['id']);
$i = 0;

// Fetch iPhone details from the catalog
$stmt = $mysqli->prepare("SELECT * FROM catalogShop WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$ipad = $result->fetch_assoc();
$stmt->close();

if (!$ipad) {
    die("iPad not found.");
}

// Fetch storage options for the selected iPhone
$stmt = $mysqli->prepare("SELECT DISTINCT storage FROM catalog WHERE name = ?");
$stmt->bind_param('s', $ipad['name']);
$stmt->execute();
$result = $stmt->get_result();
$storages = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Fetch color options for the selected iPhone
$stmt = $mysqli->prepare("SELECT DISTINCT color FROM catalog WHERE name = ?");
$stmt->bind_param('s', $ipad['name']);
$stmt->execute();
$result = $stmt->get_result();
$colors = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buy <?= htmlspecialchars($ipad['name']) ?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/buyItem-style.css">
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
                        <li><a class="login" href="#">Hello, <?= htmlspecialchars($_COOKIE['user']) ?></a>
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
        <h2>Your iPad: <?= htmlspecialchars($ipad['name']) ?></h2>
        <section id="slider-section">
            <h6>Slider Section</h6>
            <div class="slider-container">
                <!-- Slider images will be inserted here -->
            </div>
        </section>

        <form id="order-form" action="processOrder.php" method="POST">
            <input type="hidden" name="item_id" value="<?= $id ?>">
            <input type="hidden" name="category" value="iPad">
            <input type="hidden" name="price" id="hidden-price">

            <label for="storage">Choose the storage of your future iPad:</label>
            <select name="storage" id="storage">
                <?php foreach ($storages as $storage): ?>
                    <option value="<?= htmlspecialchars($storage['storage']) ?>"><?= htmlspecialchars($storage['storage']) ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="color">Choose the color of your future iPad:</label>
            <select name="color" id="color" required>
                <?php foreach ($colors as $color): ?>
                    <option value="<?= htmlspecialchars($color['color']) ?>"><?= htmlspecialchars($color['color']) ?></option>
                <?php endforeach; ?>
            </select><br>

            <div id="price-display">Price: $<span id="price"></span></div>

            <button type="submit">Add to shopping</button>
        </form>
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
        document.getElementById('storage').addEventListener('change', updatePrice);
        document.getElementById('color').addEventListener('change', updatePrice);
        document.getElementById('color').addEventListener('change', updateSliderImages);

        function updatePrice() {
            var storage = document.getElementById('storage').value;
            var color = document.getElementById('color').value;
            var iphoneId = <?= $id ?>;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'getPrice.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var price = xhr.responseText;
                    document.getElementById('price').textContent = price;
                    document.getElementById('hidden-price').value = price; // Set hidden input value
                }
            };
            xhr.send('storage=' + encodeURIComponent(storage) + '&color=' + encodeURIComponent(color) + '&iphone_id=' + encodeURIComponent(iphoneId));
        }

        function updateSliderImages() {
            var color = document.getElementById('color').value;
            var macBookName = <?= json_encode($ipad['name']) ?>; // Убедитесь, что переменная использует правильное имя устройства

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'getSliderImages.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var images = JSON.parse(xhr.responseText);
                    var sliderContainer = document.querySelector('.slider-container');
                    sliderContainer.innerHTML = '';

                    images.forEach(function (image, index) {
                        var sliderImageDiv = document.createElement('div');
                        sliderImageDiv.classList.add('slider-image');
                        if (index !== 0) sliderImageDiv.style.display = 'none';

                        var img = document.createElement('img');
                        img.src = 'image/slider1/' + image;
                        img.alt = 'Image ' + (index + 1);
                        img.classList.add('image');

                        sliderImageDiv.appendChild(img);
                        sliderContainer.appendChild(sliderImageDiv);
                    });

                    // Append navigation buttons
                    sliderContainer.innerHTML += '<button class="prev-btn">&lt;</button><button class="next-btn">&gt;</button>';
                    addSliderNavigation();
                }
            };
            xhr.send('macBookName=' + encodeURIComponent(macBookName) + '&color=' + encodeURIComponent(color));
        }


        function addSliderNavigation() {
            var currentIndex = 0;
            var slides = document.querySelectorAll(".slider-image");
            var totalSlides = slides.length;

            function showSlide(index) {
                slides.forEach(function (slide, i) {
                    slide.style.display = i === index ? 'block' : 'none';
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                showSlide(currentIndex);
            }

            slides[0].style.display = 'block';

            document.querySelector(".prev-btn").addEventListener("click", function () {
                prevSlide();
            });

            document.querySelector(".next-btn").addEventListener("click", function () {
                nextSlide();
            });
        }

        updateSliderImages();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
    </html>
<?php
$mysqli->close();
?>