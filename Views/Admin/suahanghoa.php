<?php 
require_once('../base.php');
require_once('../../Models/product_Db.php');
$product_db = new Product_Db();
$maHangHoa = $_GET['maHangHoa'];
$product = $product_db->layHangHoa($maHangHoa);
?>
<div class="container">
<h1 class="text-center">Sửa hàng hóa</h1>
<form action="../../Controllers/suahanghoa.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Mã hàng hóa</label>
        <input type="text" class="form-control" name="maHangHoa" value="<?php echo $product->maHangHoa ?>" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Tên hàng hóa</label>
        <input type="text" class="form-control" name="tenHangHoa" value="<?php echo $product->tenHangHoa ?>" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Đơn vị tính</label>
        <input type="text" class="form-control" name="donViTinh" value="<?php echo $product->donViTinh ?>" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Đơn Giá</label>
        <input type="text" class="form-control" name="donGia" value="<?php echo $product->donGia ?>" required="">
    </div>
    <div class="form-group">
        <label  class="mb-2">Image:</label>
        <input type="file" class="form-control" name="hinh" value="<?php echo $product->hinh ?>">
    </div>
  <button class="btn btn-primary mt-3">Update</button>
</form>
</div>