<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_GET['id'])) {
    die("No macBook selected.");
}

$id = intval($_GET['id']);
$i = 0;

// Fetch macBook details from the catalog
$stmt = $mysqli->prepare("SELECT * FROM catalogShop WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$macBook = $result->fetch_assoc();
$stmt->close();

if (!$macBook) {
    die("macBook not found.");
}

// Fetch chip options for the selected macBook
$stmt = $mysqli->prepare("SELECT DISTINCT chip FROM catalog WHERE name = ?");
$stmt->bind_param('s', $macBook['name']);
$stmt->execute();
$result = $stmt->get_result();
$chips = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Fetch all possible combinations of chip, RAM, and storage
$stmt = $mysqli->prepare("SELECT chip, ram, storage FROM catalog WHERE name = ?");
$stmt->bind_param('s', $macBook['name']);
$stmt->execute();
$result = $stmt->get_result();
$combinations = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Fetch color options for the selected macBook
$stmt = $mysqli->prepare("SELECT DISTINCT color FROM catalog WHERE name = ?");
$stmt->bind_param('s', $macBook['name']);
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
    <title>Buy <?= htmlspecialchars($macBook['name']) ?></title>
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
</header
<main>
    <h2>Your macBook: <?= htmlspecialchars($macBook['name']) ?></h2>
    <section id="slider-section">
        <div class="slider-container">
            <!-- Slider images will be inserted here -->
        </div>
    </section>

    <form id="order-form" action="processOrder.php" method="POST">
        <input type="hidden" name="item_id" value="<?= $id ?>">
        <input type="hidden" name="category" value="macbook">
        <input type="hidden" name="price" id="hidden-price">

        <label for="chip">Choose the Chip of your future macBook:</label>
        <select name="chip" id="chip" required>
            <?php foreach ($chips as $chip): ?>
                <option value="<?= htmlspecialchars($chip['chip']) ?>"><?= htmlspecialchars($chip['chip']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="ram">Choose the RAM of your future macBook:</label>
        <select name="ram" id="ram" required>
            <!-- Options will be populated dynamically -->
        </select><br><br>

        <label for="storage">Choose the storage of your future macBook:</label>
        <select name="storage" id="storage" required>
            <!-- Options will be populated dynamically -->
        </select><br><br>

        <label for="color">Choose the color of your future macBook:</label>
        <select name="color" id="color" required>
            <?php foreach ($colors as $color): ?>
                <option value="<?= htmlspecialchars($color['color']) ?>"><?= htmlspecialchars($color['color']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <div id="price-display">Price: $<span id="price"></span></div><br>

        <button type="submit">Add to shopping</button>
    </form>

    <!-- Hidden elements to store all combinations of chip, RAM, and storage -->
    <div id="combination-options" style="display: none;">
        <?php foreach ($combinations as $combination): ?>
            <span data-chip="<?= htmlspecialchars($combination['chip']) ?>" data-ram="<?= htmlspecialchars($combination['ram']) ?>" data-storage="<?= htmlspecialchars($combination['storage']) ?>"></span>
        <?php endforeach; ?>
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
    document.getElementById('chip').addEventListener('change', updateRamOptions);
    document.getElementById('ram').addEventListener('change', updateStorageOptions);
    document.getElementById('storage').addEventListener('change', updatePrice);
    document.getElementById('color').addEventListener('change', updateSliderImages);

    function updateRamOptions() {
        var chip = document.getElementById('chip').value;

        var ramSelect = document.getElementById('ram');
        var combinationOptions = document.getElementById('combination-options').children;
        ramSelect.innerHTML = '';

        var rams = new Set();
        for (var i = 0; i < combinationOptions.length; i++) {
            if (combinationOptions[i].getAttribute('data-chip') === chip) {
                rams.add(combinationOptions[i].getAttribute('data-ram'));
            }
        }

        rams.forEach(function(ram) {
            var option = document.createElement('option');
            option.value = ram;
            option.textContent = ram;
            ramSelect.appendChild(option);
        });

        updateStorageOptions();
    }

    function updateStorageOptions() {
        var chip = document.getElementById('chip').value;
        var ram = document.getElementById('ram').value;

        var storageSelect = document.getElementById('storage');
        var combinationOptions = document.getElementById('combination-options').children;
        storageSelect.innerHTML = '';

        var storages = new Set();
        for (var i = 0; i < combinationOptions.length; i++) {
            if (combinationOptions[i].getAttribute('data-chip') === chip && combinationOptions[i].getAttribute('data-ram') === ram) {
                storages.add(combinationOptions[i].getAttribute('data-storage'));
            }
        }

        storages.forEach(function(storage) {
            var option = document.createElement('option');
            option.value = storage;
            option.textContent = storage;
            storageSelect.appendChild(option);
        });

        updatePrice();
    }

    function updatePrice() {
        var storage = document.getElementById('storage').value;
        var ram = document.getElementById('ram').value;
        var chip = document.getElementById('chip').value;
        var color = document.getElementById('color').value;
        var macBookId = <?= $id ?>;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'getPriceForMacBook.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var price = xhr.responseText;
                document.getElementById('price').textContent = price;
                document.getElementById('hidden-price').value = price; // Set hidden input value
            }
        };
        xhr.send('storage=' + encodeURIComponent(storage) + '&ram=' + encodeURIComponent(ram) + '&chip=' + encodeURIComponent(chip) + '&color=' + encodeURIComponent(color) + '&macbook_id=' + encodeURIComponent(macBookId));
    }

    function updateSliderImages() {
        var color = document.getElementById('color').value;
        var macBookName = <?= json_encode($macBook['name']) ?>;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'getSliderImages.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var images = JSON.parse(xhr.responseText);
                var sliderContainer = document.querySelector('.slider-container');
                sliderContainer.innerHTML = '';

                images.forEach(function(image, index) {
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
            slides.forEach(function(slide, i) {
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

        document.querySelector(".prev-btn").addEventListener("click", function() {
            prevSlide();
        });

        document.querySelector(".next-btn").addEventListener("click", function() {
            nextSlide();
        });
    }
    // Initial population of RAM and storage options based on the default chip selection
    updateRamOptions();
    updateSliderImages();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
<?php
$mysqli->close();
?>
