<?php
class Cart{
    public $user_email;
    public $maHangHoa;
    public $soLuong;
    public $tongTienGio;
    public function __construct($user_email,$maHangHoa,$soLuong,$tongTienGio){
        $this->user_email = $user_email;
        $this->maHangHoa = $maHangHoa;
        $this->soLuong = $soLuong;
        $this->tongTienGio = $tongTienGio;
    }
}   