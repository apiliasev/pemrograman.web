<?php 
session_start();

require_once "database.php";
require_once "user.php";

$username = $_POST['input_username'];
$password = $_POST['input_password'];

$db = new Database();
$conn = $db->connect();
$user = new User($conn);

$ditemukan = $user->login($username, $password);

if($ditemukan==false){
    $_SESSION['pesan_kesalahan']="Login Gagal";
    header ("Location: index.php");
    exit;
}else{

$user->login($username, $password);
$_SESSION['is_logged_in'] = true;
header("Location: dashboard/index.php");
exit;
}
if($password == $password_valid &&
    $username == $username_valid);

echo "Selamat Datang" . $username ;
echo "<br />";
echo "Password Anda" . $password ;
