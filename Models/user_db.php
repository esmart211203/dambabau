<?php
require_once('db.php');
require_once('user.php');
?>
<?php
class User_Db extends Db{
    public function DangNhap($email, $matKhau)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE email = ? AND matKhau = ?");
        $sql->bind_param("ss", $email, $matKhau);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function DangKyTaiKhoan($user){
        $stmt = self::$connection->prepare("INSERT INTO user (hoTen,email, soDienThoai, matKhau, quyen) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $user->hoTen, $user->email, $user->soDienThoai, $user->matKhau, $user->quyen);
        $stmt->execute();
    }
    public function getAllUser(){
        $sql = self::$connection->prepare("SELECT * FROM user");
        $sql->execute(); //return an object
        
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        $arr = array();
        foreach($items as $key => $value){
            $arr[] = new User($value['hoTen'],$value['email'],
            $value['soDienThoai'], $value['matKhau'], $value['quyen']);
        }
        return $arr;
    }
    public function deleteUserById($email){
        $stmt = self::$connection->prepare("DELETE FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    }
}