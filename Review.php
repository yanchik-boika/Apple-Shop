<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iKnow</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/support-style.css">
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
<div class="container">
    <main>
        <section id="slider-section">
            <h6>Slider Section</h6>
            <div class="slider-container">
                <div class="slider-image" style="display: none;">
                    <img src="image/slider/1.webp" alt="Image 1">
                </div>
                <div class="slider-image">
                    <img src="image/slider/2.webp" alt="Image 2">
                </div>
                <div class="slider-image">
                    <img src="image/slider/3.2.jpeg" alt="Image 3">
                </div>
            </div>
        </section>
        <section id="form-section">
            <h2>Leave your experience of using Apple device</h2>
            <form id="my-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" pattern="^[a-zA-ZąćęłńóśżźĄĆĘŁŃÓŚŻŹ\s-]+$" maxlength="20" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" maxlength="30" size="30"
                       pattern="^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                <label for="message">Review:</label>
                <textarea id="message" name="message" required maxlength="250"></textarea>

                <h4>What do you use Apple for?</h4>
                <div class="checkbox-container">
                    <input type="checkbox" name="business" id="business">
                    <label for="business">Business</label>
                    <input type="checkbox" name="study" id="study">
                    <label for="study">Study</label>
                    <input type="checkbox" name="development" id="development">
                    <label for="development">Development</label>
                </div>

                <button type="submit">Send</button>
                <button type="reset">Undo</button>
            </form>
            <div id="form-error"></div>
        </section>
        <section id="data-section">
            <h2>Reviews:</h2>
            <ul id="data-list"></ul>
        </section>

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
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            var currentIndex = 0;
            var slides = $(".slider-image");
            var totalSlides = slides.length;

            function showSlide(index) {
                slides.hide().eq(index).show();
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                showSlide(currentIndex);
            }

            $(".slider-image").first().show();

            $(".slider-container").append('<button class="prev-btn">&lt;</button><button class="next-btn">&gt;</button>');

            $(".prev-btn").on("click", function() {
                prevSlide();
            });

            $(".next-btn").on("click", function() {
                nextSlide();
            });
        });
    </script>
</div>
</body>
</html>
