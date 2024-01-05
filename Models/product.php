<?php 
class Product {
    public $maHangHoa;
    public $tenHangHoa;
    public $donViTinh;
    public $donGia;
    public $hinh;

    public function __construct($maHangHoa,$tenHangHoa,$donViTinh,$donGia,$hinh){
        $this->maHangHoa = $maHangHoa;
        $this->tenHangHoa = $tenHangHoa;
        $this->donViTinh = $donViTinh;
        $this->donGia = $donGia;
        $this->hinh = $hinh;
    }
}