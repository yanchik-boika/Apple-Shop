<?php
//session_start();
//
//$login = $_POST['login'];
//$pass = $_POST['pass'];
//
//$mysql = new mysqli('localhost', 'root', 'root', 'tryTwo');
//
//$query = $mysql->prepare("SELECT id, pass FROM users WHERE login = ?");
//$query->bind_param('s', $login);
//$query->execute();
//$query->bind_result($userId, $hashPass);
//$query->fetch();
//$query->close();
//
//$result = $mysql->query("SELECT * FROM users WHERE login = '$login'");
//if ($result) {
//    $user = $result->fetch_assoc();
//    if ($user == null) {
//        $errors['login'] = "No user found with this login.";
//    } elseif ($user['pass'] != $hashPass) {
//        $errors['pass'] = "Incorrect password.";
//    }
//} else {
//    $errors['database'] = "Database query failed: " . $mysql->error;
//}
//
//
//$mysql->close();
//
//header('Location: loggedIndex.php');
//exit();
//



//it works good
//session_start();
//$errors = [];
//
////из формы получаем данные логина и пароля(POST-запрос)
//$login = $_POST['login'];
//$pass = $_POST['pass'];
//
////хешируем пароль для проверки
//$hashPass = md5($pass . "asdfg");
//
////полдключение к базу данных
//$mysql = new mysqli('localhost', 'root', 'root', 'tryTwo');
//if ($mysql->connect_error) {
//    die("Connection failed: " . $mysql->connect_error);
//}
////переменная которая хранит строки с данными из таблицы users
//$result = $mysql->query("SELECT * FROM users WHERE login = '$login'");
//if ($result) {//если подключение прошло успешно и данные получены
//    $user = $result->fetch_assoc();//переменная user принимает каждую строку отделюную сроку из переменной result
//    if ($user == null) {
//        $errors['login'] = "No user found with this login.";
//    } else if ($user['pass'] != $hashPass) {
//        $errors['pass'] = "Incorrect password.";
//    }
//} else {
//    $errors['database'] = "Database query failed: " . $mysql->error;
//}
//
//if (!empty($errors)) {
//    $_SESSION['errors'] = $errors;
//    $_SESSION['login'] = $login;
//    header("Location: loginHtml.php");
//    exit();
//}
//
//setcookie('user', $user['login'], time() + 3600, "/");
//$mysql->close();
//
//header('Location: loggedIndex.php');
//exit();


session_start();
$errors = [];

// Из формы получаем данные логина и пароля (POST-запрос)
$login = $_POST['login'];
$pass = $_POST['pass'];

// Хешируем пароль для проверки
$hashPass = md5($pass . "asdfg");

// Подключение к базе данных
$mysql = new mysqli('localhost', 'root', 'root', 'tryTwo');
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

// Переменная, которая хранит строки с данными из таблицы users
$result = $mysql->query("SELECT * FROM users WHERE login = '$login'");
if ($result) {
    $user = $result->fetch_assoc();
    if ($user == null) {
        $errors['login'] = "No user found with this login.";
    } else if ($user['pass'] != $hashPass) {
        $errors['pass'] = "Incorrect password.";
    }
} else {
    $errors['database'] = "Database query failed: " . $mysql->error;
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['login'] = $login;
    header("Location: loginHTML.php");
    exit();
}

setcookie('user', $user['login'], time() + 3600, "/");
$mysql->close();

header('Location: loggedIndex.php');
exit();

