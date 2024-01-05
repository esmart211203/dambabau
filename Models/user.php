<?php
class User{
    public $hoTen;
    public $email;
    public $soDienThoai;
    public $matKhau;
    public $quyen;
    public function __construct($hoTen,$email,$soDienThoai,$matKhau,$quyen='customer'){
        $this->hoTen = $hoTen;
        $this->email = $email;
        $this->soDienThoai = $soDienThoai;
        $this->matKhau = $matKhau;
        $this->quyen = $quyen;
    }
}