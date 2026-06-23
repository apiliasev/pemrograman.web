<?php 
session_start();

require_once "database.php";
require_once "users.php";

$username = $_POST['input_username'];
$password = $_POST['input_password'];

$db = new Database();
$conn = $db->connect();
$user = new Users($conn);

$ditemukan = $user->login($username, $password);

if($ditemukan==false){
    $_SESSION['pesan_kesalahan']="Login Gagal";
    header ("Location: index.php");
    exit;
}else{
$dataUser = $user->getUserByUsername($username);
$user->updateLoginCount($dataUser['id']);
$_SESSION['is_logged_in'] = true;
    $_SESSION['username']     = $dataUser['username'];
    $_SESSION['login_count']  = $dataUser['login_count'] + 1;

    header("Location: dashboard/index.php");
    exit;
}
?>