<?php
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];
$errors = [];

$loginPattern = "/^[a-zA-Z][a-zA-Z0-9]*$/";
if (!preg_match($loginPattern, $login)) {
    $errors['login'] = "Login must start with a letter and can contain only letters and digits.";
}
// Validate login length
if (mb_strlen($login) < 3 || mb_strlen($login) > 30) {
    $errors['login'] = "Login must be between 3 and 30 characters.";
}

// Validate password length
if (mb_strlen($pass) < 2 || mb_strlen($pass) > 30) {
    $errors['pass'] = "Password must be between 2 and 30 characters.";
}

// Check if passwords match
if ($pass !== $repeatpass) {
    $errors['repeatpass'] = "Password and repeated password do not match.";
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
}

// If there are errors, store them in the session and redirect back to the registration page
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['login'] = $login;
    $_SESSION['email'] = $email;
    header("Location: registerHTML.php");
    exit();
}

// Hash the password securely
//$hashPass = password_hash($pass, PASSWORD_DEFAULT);
$hashPass = md5($pass . "asdfg");

$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');

// Check if login or email already exists
$loginExistsQuery = $mysqli->prepare("SELECT COUNT(*) FROM users WHERE login = ?");
$loginExistsQuery->bind_param('s', $login);
$loginExistsQuery->execute();
$loginExistsQuery->bind_result($loginExistsCount);
$loginExistsQuery->fetch();
$loginExistsQuery->close();

$emailExistsQuery = $mysqli->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
$emailExistsQuery->bind_param('s', $email);
$emailExistsQuery->execute();
$emailExistsQuery->bind_result($emailExistsCount);
$emailExistsQuery->fetch();
$emailExistsQuery->close();


if ($loginExistsCount > 0) {
    $_SESSION['errors'] = ['login' => "Login already exists."];
    header("Location: registerHTML.php");
    exit();
}

if ($emailExistsCount > 0) {
    $_SESSION['errors'] = ['email' => "Email already exists."];
    header("Location: registerHTML.php");
    exit();
}

// Insert user into the database
$stmt = $mysqli->prepare("INSERT INTO users (login, pass, email) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $login, $hashPass, $email);
$stmt->execute();
$stmt->close();

//Here we add user's login and email into Addresses table
$stmt = $mysqli->prepare("INSERT INTO addresses (login, email) VALUES (?, ?)");
$stmt->bind_param('sss', $login,  $email);
$stmt->execute();
$stmt->close();

header('Location: index.php');
exit();
