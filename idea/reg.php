<?php

if(isset($_POST["login"])){
    $login = $_POST["login"];
}
if(isset($_POST["pwd"])){
  
    $pwd = $_POST["pwd"];
}

if( isset( $_POST['login_btn'] )) {
    $sql = "INSERT INTO users (id, login, pwd)
    VALUES ('220',$login, $pwd)";
}
    
$servername = "localhost";
$username = "bot";
$password = "12345";
$dbname = "test";
$table_name = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "INSERT INTO users (id, login, pwd)
// VALUES ('200','lg1', 'pwd1')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>