<?php
require_once('db.php');
require_once('product.php');
?>
<?php
class Product_Db extends Db{
    public function getAllProduct(){
        $sql = self::$connection->prepare("SELECT * FROM product");
        $sql->execute(); //return an object
        
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        $arrProduct = array();
        foreach($items as $key => $value){
            $arrProduct[] = new Product($value['maHangHoa'],$value['tenHangHoa'],
            $value['donViTinh'], $value['donGia'], $value['hinh']);
        }
        return $arrProduct;
    }
    public function themHangHoa($product){
        $stmt = self::$connection->prepare("INSERT INTO product (maHangHoa,tenHangHoa, donViTinh, donGia, hinh) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssis",$product->maHangHoa, $product->tenHangHoa, $product->donViTinh, $product->donGia, $product->hinh);
        $stmt->execute();
    }
    public function xoaHangHoaTheoMa($maHangHoa){
        $stmt = self::$connection->prepare("DELETE FROM product WHERE maHangHoa = ?");
        $stmt->bind_param("s", $maHangHoa);
        $stmt->execute();
    }
    public function layHangHoa($maHangHoa) {
        $sql = self::$connection->prepare("SELECT * FROM product WHERE maHangHoa = ?");
        $sql->bind_param("s", $maHangHoa);
        $sql->execute();
        $product = $sql->get_result()->fetch_assoc();
        if ($product) {
            $item = new Product($product['maHangHoa'], $product['tenHangHoa'], $product['donViTinh'], $product['donGia'], $product['hinh']);
            return $item;
        }
        return null;
    }
    public function suaHangHoa($product){
        $stmt = self::$connection->prepare("UPDATE product SET maHangHoa = ?, tenHangHoa = ?,donViTinh = ?,donGia = ?,hinh = ? WHERE maHangHoa = ?");
        $stmt->bind_param("sssiss", $product->maHangHoa, $product->tenHangHoa, $product->donViTinh,
        $product->donGia, $product->hinh, $product->maHangHoa);
        $stmt->execute();
    }

















    public function deleteProductById($ma){
        $stmt = self::$connection->prepare("DELETE FROM product WHERE ma = $ma");
        $stmt->execute();
    }
    public function createProducts($product){
        $stmt = self::$connection->prepare("INSERT INTO product (ma,name, category_id, price, description, image) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssiiss",$product->ma, $product->name, $product->category_id, $product->price, $product->description, $product->image);
        $stmt->execute();
    }
    public function updateProduct($product){
        $stmt = self::$connection->prepare("UPDATE product SET name = ?, category_id = ?,price = ?,description = ?,image = ? WHERE ma = ?");
        $stmt->bind_param("siisss", $product->name, $product->category_id, $product->price, $product->description, $product->image, $product->ma);
        $stmt->execute();
    }
}