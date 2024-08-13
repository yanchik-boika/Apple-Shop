<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_POST['macbook_id']) || !isset($_POST['storage']) || !isset($_POST['ram']) || !isset($_POST['chip']) || !isset($_POST['color'])) {
    die("Invalid request.");
}

$macbook_id = intval($_POST['macbook_id']);
$storage = $mysqli->real_escape_string($_POST['storage']);
$ram = $mysqli->real_escape_string($_POST['ram']);
$chip = $mysqli->real_escape_string($_POST['chip']);
$color = $mysqli->real_escape_string($_POST['color']);

// Fetch price based on MacBook ID, storage, ram, chip, and color
$stmt = $mysqli->prepare("SELECT price FROM catalog WHERE name = (SELECT name FROM catalogShop WHERE id = ?) AND storage = ? AND ram = ? AND chip = ? AND color = ?");
if (!$stmt) {
    die("Prepare statement failed: " . $mysqli->error);
}

$stmt->bind_param('issss', $macbook_id, $storage, $ram, $chip, $color);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $price = $result->fetch_assoc();
    if ($price) {
        echo htmlspecialchars($price['price']);
    } else {
        echo "Price not found.";
    }
} else {
    echo "Error fetching price: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
