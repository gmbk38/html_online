<?php
$servername = "localhost:3306"; // Имя хоста БД
$username = "u1366_kasper"; // Пользователь БД
$password = "KASPER38!"; // Пароль к базе
$dbname = "u1366079_csg"; // Имя базы

$conn = new mysqli($servername, $username, $password, $dbname);

$login = $_POST["login"];
$pwd = $_POST["pwd"];

if(isset($_POST["new_acc"])){
	if(isset($_POST["agreement"])) {
		$sql = "INSERT INTO accounts (login, pwd) values ('$login','$pwd');";
		// $new_table = "CREATE TABLE `$login` (lc varchar(20) NULL, case_drop varchar(40), balance int, PRIMARY KEY (balance));";
		$new_table = "CREATE TABLE `$login` ( `id` INT NOT NULL AUTO_INCREMENT , `lc` VARCHAR(20) NOT NULL , `case_drop` INT(20) NOT NULL , `balance` INT(20) NOT NULL , PRIMARY KEY (`id`));";
		$conn->query($new_table);
		$upd_table = "INSERT INTO `$login` (balance) values (0);";
		$conn->query($upd_table);
		if ($conn->query($sql) === TRUE) {
			echo '<script language="javascript">';
			echo 'alert("Регистрация прошла успешно")';
			echo '</script>';
			require_once('index.html');
		}
		$conn->close();
	} else {
		echo '<script language="javascript">';
		echo 'alert("Вы не согласились с пользовательским соглашением")';
		echo '</script>';
		require_once('index.html');
	}
} else if (isset($_POST["sell_item"])) {
	
	$login = $_POST["login_php"];
	$curr_balance = $_POST["balance_php"];
	$case_drop = $_POST["balance_php"];
	$upd_table = "INSERT INTO `$login` (case_drop, balance) values ('$case_drop','$curr_balance');";
	$conn->query($upd_table);
	
	$name = $login;
	$balance = $curr_balance;
	
	require_once('index.html');
	
	$conn->close();
} else if (isset($_POST["get_item"])) {
	
	$login = $_POST["login_php"];
	$curr_balance = $_POST["balance_php"];
	$case_drop = $_POST["balance_php"];
	$upd_table = "INSERT INTO `$login` (case_drop, balance) values ('$case_drop','$curr_balance');";
	$conn->query($upd_table);
	
	$name = $login;
	$balance = $curr_balance;
	
	require_once('index.html');
	
	$conn->close();
} else {
	$sql = "SELECT * FROM accounts WHERE login = '$login' AND pwd = '$pwd'";
	$name = "SELECT * FROM accounts WHERE login = '$login' AND pwd = '$pwd'";
	$data = "SELECT * FROM $login ORDER BY id DESC";
	
	$name_res = $conn->query($name);
	$data_res = $conn->query($data);
	
	$point = $name_res->fetch_array(MYSQLI_ASSOC);
	$point2 = $data_res->fetch_array(MYSQLI_ASSOC);
	
	$name = $point["login"];
	
	$balance = $point2["balance"];
	
	$result = $conn->query($sql);
	$row = $result->fetch_array(MYSQLI_ASSOC);

	if ($row["pwd"] == $pwd && $row["login"] == $login) {
		require_once('index.html');
	}
	else {
	 /* echo "Ошибка авторизации, проверьте данные для входа!"; */
		echo '<script language="javascript">';
		echo 'alert("Неправильные данные для входа")';
		echo '</script>';
		require_once('index.html');
	}

$conn->close();
}

?>