<?php

//make sure to give the right path to the autoloader file.
use Dotenv\Dotenv;
// Load .env file from the root of your project
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$conn = mysqli_connect($_ENV["SERVER"], $_ENV["USERNAME"],$_ENV["PASSWORD"], $_ENV["DATABASE"]);

if (!$conn) {
  die("There A Problem On The Connection : " . mysqli_connect_error());
}
