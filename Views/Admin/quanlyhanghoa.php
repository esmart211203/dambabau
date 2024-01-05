<?php 
require_once('../base.php');
require_once('../../Models/product_Db.php');
$product_db = new Product_Db();
$all_product = $product_db->getAllProduct();
?>


<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Esmart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
      </ul>
    </div>
    <form class="d-flex">
      <a class="btn btn-primary" href="../Controllers/dangxuat.php">Đăng xuất</a>
    </form>
  </div>
</nav>
  <?php
      if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'></button>
              Record ADDED successfully
              </div>";
      } 
      if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'></button>
              Record UPDATED successfully
              </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'></button>
              Record DELETED successfully
              </div>";
      }
  ?>
<h1 class="text-center">Quản lý hàng hóa</h1>
<form action="../../Controllers/themhanghoa.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Mã hàng hóa</label>
    <input type="text" class="form-control" name="maHangHoa" placeholder="Nhập mã hàng hóa" required="">
  </div>
  <div class="mb-3">
    <label class="form-label">Tên hàng hóa</label>
    <input type="text" class="form-control" name="tenHangHoa" placeholder="Nhập tên hàng hóa" required="">
  </div>
  <div class="mb-3">
    <label class="form-label">Đơn vị tính</label>
    <input type="text" class="form-control" name="donViTinh" placeholder="Nhập đơn vị tính" required="">
  </div>
  <div class="mb-3">
    <label class="form-label">Đơn Giá</label>
    <input type="text" class="form-control" name="donGia" placeholder="Nhập đơn giá" required="">
  </div>
  <div class="form-group">
      <label  class="mb-2">Image:</label>
      <input type="file" class="form-control" name="hinh" required="">
    </div>
  <button class="btn btn-primary mt-3">Add</button>
</form>
<hr>
<table class="table table-striped table-hover table-bordered mt-5">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col" class="font-weight-bold">Mã hàng hóa</th>
      <th scope="col" class="font-weight-bold">Tên hàng hóa</th>
      <th scope="col" class="font-weight-bold">Đơn vị tính</th>
      <th scope="col" class="font-weight-bold">Đơn giá</th>
      <th scope="col" class="font-weight-bold">Hình</th>
      <th scope="col" class="font-weight-bold">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($all_product as $key => $value) { ?>
    <tr>
      <th scope="row"><?php echo $value->maHangHoa ?></th>
      <td><?php echo $value->tenHangHoa ?></td>
      <td><?php echo $value->donViTinh ?></td>
      <td><?php echo $value->donGia ?></td>
      <td>
        <img src="../../uploads/<?php echo $value->hinh ?>" height="60px" alt="image">
      </td>
      <td>
        <form action="../../Controllers/xoahanghoa.php" method="post">
            <a href="suahanghoa.php?maHangHoa=<?php echo $value->maHangHoa ?>" class="btn btn-info">Sua</a>
            <input type="hidden" name="maHangHoa" value="<?php echo $value->maHangHoa ?>">
            <button class="btn btn-danger">Xoa</button>
        </form>
      </td>
    </tr>  
    <?php  }  ?>
  </tbody>
</table>
</div>