<?php
session_start();
if (!isset($_SESSION['loggedin'])) {$_SESSION['loggedin'] = false;}
if (!isset($_SESSION['user'])) {$_SESSION['user'] = array();}
//products
require_once('../Models/product_Db.php');
$product_db = new Product_Db();
$all_product = $product_db->getAllProduct();
//carts
if($_SESSION['user']){
    require_once('../Models/cart_db.php');
    $cart_db = new Cart_Db();
    $email_user = $_SESSION['user'][0]['email'];
    $my_cart = $cart_db->layGioHang($email_user);
    //ma san pham trong gio
    $maHangHoaArray = array();
    foreach ($my_cart as $cart) {
        $maHangHoaArray[] = $cart->maHangHoa;
    }
    $hangHoaArray = array();
    #lay san pham trong gio
    foreach ($maHangHoaArray as $maHangHoa) {
        $product = $product_db->layHangHoa($maHangHoa);
        if ($product) {
            $hangHoaArray[] = $product;
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Esmart shop / carts</title>
</head>
<body>
    <div class="container">
        <div class="banner">
            <img src="../Public/images/bannerdutiec.jpg" height="200" alt="">
        </div>
        <div class="menu">
            <a href="index.php">Trang chủ</a> 
            <a href="">Giới thiệu</a> 
            <a href="">Dịch vụ</a> 
            <a href="">Sản phẩm</a> 
            <a href="">Liên hệ</a> 
            
            <?php if($_SESSION['loggedin'] == true){
                echo '
                <a href="">Giỏ <i class="fa-solid fa-cart-shopping"></i></a>
                <a href="../Controllers/dangxuat.php">Đăng xuất</a>
                ';
            }else{
                echo '<a href="auth/dangnhap.php">Đăng nhập</a>';
            } ?>  
        </div>
        <div class="clear"></div>
        <div class="trai">
            <h3>Danh mục sản phẩm</h3>
            <ul>
                <li>
                    <a href="">Áo len</a>
                    <ul>
                        <li><a href="">Áo len cổ lọ</a></li>
                        <li><a href="">Áo len cổ lọ</a></li>
                        <li><a href="">Áo len cổ lọ</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Đầm bầu</a>
                    <ul>
                        <li><a href="">Áo len cổ lọ</a></li>
                        <li><a href="">Áo len cổ lọ</a></li>
                        <li><a href="">Áo len cổ lọ</a></li>
                    </ul>
                </li>
            </ul>
        
        </div>
        <div class="clear"></div>
        <div class="phai">
            <h3>Sản phẩm trong giỏ</h3>
            <div class="sanpham">
                <?php foreach ($hangHoaArray as $key => $value) { ?>
                <div class="box-san-pham">
                    <img src="../uploads/<?php echo $value->hinh ?>" height="210px" alt="">
                    <p class="ten-san-pham" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                        <?php echo $value->tenHangHoa ?>
                    </p>
                    <p class="gia"><?php echo $value->donGia ?> VND</p>
                    <p>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </p>
                </div>
                <?php } ?>
            </div>
            
        </div>
        <div class="clear"></div>
        <div class="footer">
            <div class="menuduoi"> 
                <a href="">Trang chủ</a> 
                <a href="">Giới thiệu</a> 
                <a href="">Dịch vụ</a> 
                <a href="">Sản phẩm</a> 
                <a href="">Liên hệ</a> 
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>