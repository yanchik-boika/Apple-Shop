<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_COOKIE['user'];
    $item = $_POST['item'];
    $storage = $_POST['storage'];
    $color = $_POST['color'];

    $stmt = $mysqli->prepare("DELETE FROM iPhoneOrders WHERE user = ? AND item = ? AND storage = ? AND color = ?");
    $stmt->bind_param('ssss', $user, $item, $storage, $color);
    $stmt->execute();
    $stmt->close();
}

$mysqli->close();
header('Location: ShoppingBasket.php');
exit();
?>

