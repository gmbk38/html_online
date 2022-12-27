<?php
$servername = "localhost:3306"; // Имя хоста БД
$username = "u1366_control"; // Пользователь БД
$password = "DimaCSG38"; // Пароль к базе
$dbname = "u1366079_csgears"; // Имя базы

$conn = new mysqli($servername, $username, $password, $dbname);


$login = $conn->real_escape_string($_POST["login"]);
$balance = $conn->real_escape_string($_POST["my_balance"]);
$lc = $conn->real_escape_string($_POST["lc"]);
$sql = "INSERT INTO status (login, balance, lc) values ('$login','$balance','$lc');";

if ($conn->query($sql) === TRUE) {
 echo "Регистрация прошла успешно";	
}
$conn->close();
?>