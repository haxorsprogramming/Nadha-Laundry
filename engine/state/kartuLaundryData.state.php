<?php

class kartuLaundryData{
  
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function kartuLaundryAll()
  {
    $this -> st -> query("SELECT * FROM tbl_kartu_laundry ORDER BY id DESC;");
    return $this -> st -> queryAll();
  }

  public function namaPelanggan($pelanggan)
  {
    $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$pelanggan';");
    return $this -> st -> querySingle();
  }

  public function jumlahTemp($kodeService)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kodeService';");
    return $this -> st -> numRow();
  }

  public function dataTemp()
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kodeService';");
    return $this -> st -> queryAll();
  }
 
}