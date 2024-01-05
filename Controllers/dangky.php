<?php
include_once('../Models/user_db.php');
include_once('../Models/user.php');
$user_db = new User_Db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $hoTen = $_POST['hoTen'];
    $soDienThoai = $_POST['soDienThoai'];
    $email = $_POST['email'];
    $matKhau = $_POST['matKhau'];
    
    $new_user = new User($hoTen,$email,$soDienThoai,$matKhau);
    $user_db->DangKyTaiKhoan($new_user);

    header("Location: ../Views/Auth/dangnhap.php");
}
?>