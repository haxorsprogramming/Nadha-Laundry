<?php

class pembayaranData{
  
 private $st;

    public function __construct()
    {
      $this -> st = new state;
    }

    public function getKartuLaundry($kd)
    {
      $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kd';");
      return $this -> st -> querySingle();
    }

    public function getItemCucian($kdRegistrasi)
    {
      $this -> st -> query("SELECT * FROM tbl_temp_item_cucian WHERE kd_room='$kdRegistrasi';");
      return $this -> st -> queryAll();
    }

    public function getNamaService($kdItem)
    {
      $this -> st -> query("SELECT nama FROM tbl_service WHERE kd_service='$kdItem' LIMIT 0,1;");
      return $this -> st -> querySingle();
    }

    public function jlhPromoCode($kd)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kd' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> numRow();
    }

    public function getPromo($kd)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kd' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> querySingle();
    }

    public function getTempCucian($kdService)
    {
      $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kdService';");
      return $this -> st -> queryAll();
    }

    public function jlhPromo($kdPromo)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kdPromo' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> numRow();
    }

    public function qPromo($kdPromo)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kdPromo' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> querySingle();
    }

}