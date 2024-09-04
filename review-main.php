<?php
//// reviews.php
//
//$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
//if ($mysqli->connect_error) {
//    die("Connection failed: " . $mysqli->connect_error);
//}
//
//// Обработка отправки формы
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $name = $mysqli->real_escape_string($_POST['name']);
//    $email = $mysqli->real_escape_string($_POST['email']);
//    $review = $mysqli->real_escape_string($_POST['message']);
//
//    $sql = "INSERT INTO reviews (name, email, review) VALUES ('$name', '$email', '$review')";
//
//    if ($mysqli->query($sql) === TRUE) {
//        echo "New review added successfully";
//    } else {
//        echo "Error: " . $sql . "<br>" . $mysqli->error;
//    }
//}
//
//// Получение всех отзывов из базы данных
//$sql = "SELECT name, email, review FROM reviews";
//$result = $mysqli->query($sql);
//
//$reviews = [];
//if ($result->num_rows > 0) {
//    while($row = $result->fetch_assoc()) {
//        $reviews[] = $row;
//    }
//}
//
//$mysqli->close();
//?>








<?php
// review-main.php

// Подключение к базе данных
$servername = "localhost";
$username = "root"; // ваш пользователь базы данных
$password = "root"; // ваш пароль базы данных
$dbname = "tryTwo"; // название базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $review = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO reviews (login, email, review) VALUES ('$name', '$email', '$review')";

    if ($conn->query($sql) === TRUE) {
        // Успешное добавление, можно сделать редирект или показать сообщение
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Получение всех отзывов из базы данных
$sql = "SELECT login, email, review FROM reviews";
$result = $conn->query($sql);

$reviews = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

$conn->close();
?>
