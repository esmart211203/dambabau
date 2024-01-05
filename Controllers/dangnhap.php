<?php
session_start(); // Bắt đầu session
include_once('../Models/user_db.php');
$user_db = new User_Db();
if (!isset($_SESSION['user'])) {$_SESSION['user'] = array();}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu
    $email = $_POST["email"];
    $matKhau = $_POST["matKhau"];
    $user = $user_db->DangNhap($email,$matKhau);
    if($user){
        $_SESSION['user'] = $user;
        $_SESSION['loggedin'] = true; 
        if ($user[0]['quyen'] === 'admin') {
            header("Location: ../Views/Admin/quanlyhanghoa.php");
            exit(); 
        }
        header("Location: ../Views/index.php");
        exit(); 
    }
}
?>