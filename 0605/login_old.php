<?php
$servername = "localhost:3306"; // Имя хоста БД
$username = "u1366_control"; // Пользователь БД
$password = "DimaCSG38"; // Пароль к базе
$dbname = "u1366079_csgears"; // Имя базы

$conn = mysqli_connect($servername, $username, $password, $dbname);
$login = $_POST["login"];
$pwd = $_POST["pwd"];

$sql = "SELECT * FROM accounts WHERE login = '$login' AND pwd = '$pwd'";

$name = "SELECT * FROM accounts WHERE login = '$login' AND pwd = '$pwd'";
$name_res = $conn->query($name);
$point = $name_res->fetch_array(MYSQLI_ASSOC);
$name = $point["login"];


$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row["pwd"] == $pwd && $row["login"] == $login) {
	
$balance=$row["balance"];
	
 /* $id_for_data = $row["id"]; */
 require_once('index.html');
 /* require_once('index.html'); */
 /* header("Location: index.html"); */
 /* echo "Успешная авторизация ";
 echo "   Ваш id:   ";
 echo $row["id"];
 echo "   Ваш пароль:   ";
 echo $row["pw"]; */
}
else {
 /* echo "Ошибка авторизации, проверьте данные для входа!"; */
 header("Location: login.html");	
}

$conn->close();

?>