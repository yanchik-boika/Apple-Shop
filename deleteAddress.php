<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['id']) && isset($_COOKIE['user'])) {
    $id = $_GET['id'];
    $user = $_COOKIE['user'];

    $stmt = $mysqli->prepare("DELETE FROM addresses WHERE id = ? AND login = ?");
    $stmt->bind_param('is', $id, $user);
    $stmt->execute();
    $stmt->close();
}
header("Location: Preferences.php");
exit();
?>
