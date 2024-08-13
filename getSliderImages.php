<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_POST['macBookName']) || !isset($_POST['color'])) {
    die("Invalid request.");
}

$macBookName = $_POST['macBookName'];
$color = $_POST['color'];

$stmt = $mysqli->prepare("SELECT image FROM sliderPhotos WHERE itemName = ? AND color = ?");
$stmt->bind_param('ss', $macBookName, $color);
$stmt->execute();
$result = $stmt->get_result();
$images = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$mysqli->close();

echo json_encode(array_column($images, 'image'));
?>
