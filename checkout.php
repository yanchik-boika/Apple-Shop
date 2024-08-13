<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Проверка, что пользователь вошел в систему
if (!isset($_COOKIE['user']) || empty($_COOKIE['user'])) {
    die("User is not logged in.");
}

$user = $_COOKIE['user'];

// Обработка покупки (например, отправка письма с подтверждением, обновление базы данных и т.д.)
// Здесь вы можете добавить код для оформления заказа

// Очищение корзины пользователя (удаление всех заказов пользователя из таблицы orders)
$stmt = $mysqli->prepare("DELETE FROM iPhoneOrders WHERE user = ?");
if (!$stmt) {
    die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
}

$stmt->bind_param('s', $user);

if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
}

$stmt->close();
$mysqli->close();

// Перенаправление на страницу подтверждения заказа
header("Location: orderConfirmation.php");
exit();
?>

