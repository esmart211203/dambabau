<?php
require_once('db.php');
require_once('cart.php');
?>
<?php
class Cart_Db extends Db{
    public function layGioHang($user_email) {
        $sql = self::$connection->prepare("SELECT * FROM Carts WHERE user_email = ?");
        $sql->bind_param("s", $user_email);
        $sql->execute();
        
        $result = $sql->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
    
        $arrProduct = array();
        foreach ($items as $item) {
            $arrProduct[] = new Cart($item['user_email'], $item['maHangHoa'], $item['soLuong'], $item['tongTienGio']);
        }
        return $arrProduct;
    }
    public function themVaoGio($cart) {
        $gioHang = $this->layGioHang($cart->user_email); 
        $sanPhamDaTonTai = false;
    
        foreach ($gioHang as $item) {
            if ($item->maHangHoa === $cart->maHangHoa) {
                $item->soLuong += $cart->soLuong;
                $item->tongTienGio += $cart->dongia; // Tính toán tổng giỏ hàng

    
                $stmt = self::$connection->prepare("UPDATE carts SET soLuong = ?, tongTienGio = ? WHERE user_email = ? AND maHangHoa = ?");
                $stmt->bind_param("iiss", $item->soLuong, $item->tongTienGio, $cart->user_email, $cart->maHangHoa);
                $stmt->execute();
    
                $sanPhamDaTonTai = true;
                break;
            }
        }
    
        if (!$sanPhamDaTonTai) {
            $stmt = self::$connection->prepare("INSERT INTO carts (user_email, maHangHoa, soLuong, tongTienGio) VALUES (?,?,?,?)");
            $stmt->bind_param("ssii", $cart->user_email, $cart->maHangHoa, $cart->soLuong, $cart->tongTienGio);
            $stmt->execute();
        }
    }
}