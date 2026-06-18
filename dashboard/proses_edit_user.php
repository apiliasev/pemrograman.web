<?php

require_once "../database.php";
require_once "../users.php";

$username = $_POST["username"] ?? "";
$email = $_POST["email"] ?? "";
$asal = $_POST["asal"] ?? "";
$password = $_POST["password"] ?? "";
$id = $_POST["id"];

$database = new Database();
$conn = $database->connect();

$user = new users($conn);
$user->update($id, $username, $email, $asal, $password);

header("Location: index.php");