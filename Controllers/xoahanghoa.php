<?php
include_once('../Models/product_db.php');
$product_db = new Product_Db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maHangHoa = isset($_POST['maHangHoa']) ? $_POST['maHangHoa'] : '';
    $product_db->xoaHangHoaTheoMa($maHangHoa);
    header("Location: ../Views/Admin/quanlyhanghoa.php?msg3=delete");
}

