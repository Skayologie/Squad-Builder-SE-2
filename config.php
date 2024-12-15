<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$db = "fut_database";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
  die("There A Problem On The Connection : " . $conn->connect_error);
}
