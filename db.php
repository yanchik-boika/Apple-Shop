<?php
//
//$servername = "localhost";
//$username = "root";
//$password = "root";
//$dbname = "registerUser";
//
//$mysql = new mysqli($servername, $username, $password, $dbname);
//if (!$mysql) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "registerUser";

// Создаем подключение
$mysql = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
?>

