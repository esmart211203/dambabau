<?php
session_start(); // Bắt đầu session
include_once('../Models/cart_db.php');
include_once('../Models/cart.php');
$cart_db = new Cart_Db();
?>

<?php
if($_SESSION['loggedin'] == true && $_SESSION['user']){
    $email_user = $_SESSION['user'][0]['email'];
    $maHangHoa = $_GET['maHangHoa'];
    $soLuong = 1;
    $tongTienGio += $_GET['donGia'];
    $cart = new Cart($email_user,$maHangHoa,$soLuong,$tongTienGio);
    $cart_db->themVaoGio($cart);
    header("Location: ../Views/giohang.php");
    exit();
}else{
    header("Location: ../Views/Auth/dangnhap.php");
    exit();
}
?>