<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$db = "fut_database";
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("There A Problem On The Connection : " . mysqli_connect_error());
}
