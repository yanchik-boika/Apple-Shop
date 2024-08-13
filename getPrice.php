<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_POST['iphone_id']) || !isset($_POST['storage']) || !isset($_POST['color'])) {
    die("Invalid request.");
}

$iphone_id = intval($_POST['iphone_id']);
$storage = $mysqli->real_escape_string($_POST['storage']);
$color = $mysqli->real_escape_string($_POST['color']);

// Fetch price based on iPhone ID, storage, and color
$stmt = $mysqli->prepare("SELECT price FROM catalog WHERE name = (SELECT name FROM catalogShop WHERE id = ?) AND storage = ? AND color = ?");
$stmt->bind_param('iss', $iphone_id, $storage, $color);
$stmt->execute();
$result = $stmt->get_result();
$price = $result->fetch_assoc();
$stmt->close();

if ($price) {
    echo htmlspecialchars($price['price']);
} else {
    echo "Price not found.";
}

$mysqli->close();
?>
