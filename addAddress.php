<?php
session_start();
$mysqli = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$user = $_COOKIE['user'];

if ($user) {
    // Retrieve the user's email from the database
    $stmt = $mysqli->prepare("SELECT email FROM users WHERE login = ?");
    $stmt->bind_param('s', $user);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();
    $stmt->close();

    // Check if the email was retrieved successfully
    if ($email) {
        // Check how many addresses the user already has
        $stmt = $mysqli->prepare("SELECT COUNT(*) FROM addresses WHERE login = ?");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $stmt->bind_result($addressCount);
        $stmt->fetch();
        $stmt->close();

        if ($addressCount < 2) {
            // Insert the new address
            $stmt = $mysqli->prepare("INSERT INTO addresses (login, email, country, city, street, house, flat, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssssss', $user, $email, $_POST['country'], $_POST['city'], $_POST['street'], $_POST['house'], $_POST['flat'], $_POST['zip']);
            if ($stmt->execute()) {
                $_SESSION['success'] = "Address added successfully.";
            } else {
                $_SESSION['errors'] = ['db' => "Failed to insert the address: " . $stmt->error];
            }
            $stmt->close();
        } else {
            $_SESSION['errors'] = ['address' => "You can only add up to 2 addresses."];
        }
    } else {
        $_SESSION['errors'] = ['email' => "Email not found for the user."];
    }
} else {
    $_SESSION['errors'] = ['user' => "User is not set."];
}

header("Location: Preferences.php");
exit();

