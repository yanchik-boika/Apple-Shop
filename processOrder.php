<?php
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Validate input
if (!isset($_POST['item_id']) || !isset($_POST['storage']) || !isset($_POST['color']) || !isset($_POST['price']) || !isset($_POST['category'])) {
    die("Invalid request.");
}

$item_id = intval($_POST['item_id']);
$storage = $_POST['storage'];
$color = $_POST['color'];
$price = floatval($_POST['price']);
$category = $_POST['category'];
$user = $_COOKIE['user']; // Assuming user is stored in cookie

if (empty($user)) {
    die("User is not logged in.");
}

// Fetch item name from catalogShop
$stmt = $mysqli->prepare("SELECT name FROM catalogShop WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
}

$stmt->bind_param('i', $item_id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();
$stmt->close();

if (!$item) {
    die("Item not found.");
}

$item_name = $item['name'];

// Insert order into orders table
$stmt = $mysqli->prepare("INSERT INTO iPhoneOrders (user, item, category, storage, color, price) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
}

$stmt->bind_param('sssssd', $user, $item_name, $category, $storage, $color, $price);

if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
}

$stmt->close();
$mysqli->close();

header("Location: index.php");
exit();
?>





<?php
//session_start();
//
//// Устанавливаем отображение ошибок
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//
//$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
//if ($mysqli->connect_error) {
//    die("Connection failed: " . $mysqli->connect_error);
//}
//
//if (!isset($_POST['iphone_id']) || !isset($_POST['storage']) || !isset($_POST['color']) || !isset($_POST['price'])) {
//    die("Invalid request.");
//}
//
//$iphone_id = intval($_POST['iphone_id']);
//$storage = $_POST['storage'];
//$color = $_POST['color'];
//$price = floatval($_POST['price']);
//$user = $_COOKIE['user']; // Assuming user is stored in cookie
//
//if (empty($user)) {
//    die("User is not logged in.");
//}
//
//// Fetch iPhone name from catalogShop
//$stmt = $mysqli->prepare("SELECT name FROM catalogShop WHERE id = ?");
//if (!$stmt) {
//    die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
//}
//
//$stmt->bind_param('i', $iphone_id);
//$stmt->execute();
//$result = $stmt->get_result();
//$iphone = $result->fetch_assoc();
//$stmt->close();
//
//if (!$iphone) {
//    die("iPhone not found.");
//}
//
//$iphone_name = $iphone['name'];
//
//// Insert order into orders table
//$stmt = $mysqli->prepare("INSERT INTO iPhoneOrders (user, item, category, storage, color, price) VALUES (?, ?, ?, ?, ?, ?)");
//if (!$stmt) {
//    die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
//}
//
//$category = 'iPhone'; // Assuming category is iPhone
//$stmt->bind_param('sssssd', $user, $iphone_name, $category, $storage, $color, $price);
//
//if (!$stmt->execute()) {
//    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
//}
//
//$stmt->close();
//$mysqli->close();
//
//header("Location: index.php");
//exit();
//?>
