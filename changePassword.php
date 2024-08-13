<?php
session_start();
$errors = [];

// Check if user is logged in
if (!isset($_COOKIE['user'])) {
    header("Location: loginHTML.php");
    exit();
}

$login = $_COOKIE['user'];
$currentPass = $_POST['currentPass'];
$newPass = $_POST['newPass'];
$repeatNewPass = $_POST['repeatNewPass'];

// Connect to the database
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the current hashed password from the database
$stmt = $mysqli->prepare("SELECT pass FROM users WHERE login = ?");
$stmt->bind_param('s', $login);
$stmt->execute();
$stmt->bind_result($passFromDB);
$stmt->fetch();
$stmt->close();

// Verify the entered current password
$enteredPassHash = md5($currentPass . "asdfg");
if ($passFromDB !== $enteredPassHash) {
    $errors['currentPass'] = "Entered passwords do not match with existing password.";
}

// Check the length of the new password
if (mb_strlen($newPass) < 3 || mb_strlen($newPass) > 30) {
    $errors['newPass'] = "New password must be between 6 and 30 characters.";
}

// Check if the new password and repeated new password match
if ($newPass !== $repeatNewPass) {
    $errors['repeatNewPass'] = "New password and repeated new password do not match.";
}

// If there are errors, save them in the session and redirect back to the settings page
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: changePasswordHTML.php");
    exit();
}

// Hash the new password using the same method and update it in the database
$newHashPass = md5($newPass . "asdfg");
$stmt = $mysqli->prepare("UPDATE users SET pass = ? WHERE login = ?");
$stmt->bind_param('ss', $newHashPass, $login);
$stmt->execute();
$stmt->close();

$_SESSION['success'] = "Password changed successfully.";
header("Location: changePasswordHTML.php");
exit();
