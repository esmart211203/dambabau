<?php
include_once('../Models/product_db.php');
include_once('../Models/product.php');
$product_db = new Product_Db();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maHangHoa = isset($_POST['maHangHoa']) ? $_POST['maHangHoa'] : '';
    $tenHangHoa = isset($_POST['tenHangHoa']) ? $_POST['tenHangHoa'] : '';
    $donViTinh = isset($_POST['donViTinh']) ? $_POST['donViTinh'] : '';
    $donGia = isset($_POST['donGia']) ? $_POST['donGia'] : '';
    $hinh = '';

    if (isset($_FILES['hinh']['name'])) {
        $hinh = basename($_FILES['hinh']['name']);
        $target_dir = '../uploads/';
        $target_file = $target_dir . $hinh;
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);
    }

    $hanghoa_moi = new Product($maHangHoa,$tenHangHoa, $donViTinh, $donGia,$hinh);
    $product_db->themHangHoa($hanghoa_moi);
    header("Location: ../Views/Admin/quanlyhanghoa.php?msg3=insert");
}