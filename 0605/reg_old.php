<?php
$servername = "localhost:3306"; // Имя хоста БД
$username = "u1366_control"; // Пользователь БД
$password = "DimaCSG38"; // Пароль к базе
$dbname = "u1366079_csgears"; // Имя базы

$conn = new mysqli($servername, $username, $password, $dbname);


$login = $conn->real_escape_string($_POST["login"]);
$pwd = $conn->real_escape_string($_POST["pwd"]);
$sql_main = "CREATE TABLE '$login' (balance INT, pct INT, lc INT);";
$sql = "INSERT INTO accounts (login, pwd) values ('$login','$pwd');";

if ($conn->query($sql) === TRUE) {
 echo "Регистрация прошла успешно";	
}
$conn->close();
?>