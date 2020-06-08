<?php

class laundryRoomData{
  
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function laundryRoomData()
  {
    $this -> st -> query("SELECT * FROM tbl_laundry_room WHERE status !='finish' ORDER BY id DESC;");
    return $this -> st -> queryAll();
  }

  public function laundryRoomMembers($kdKartu)
  {
    $this -> st -> query("SELECT pelanggan, waktu_masuk FROM tbl_kartu_laundry WHERE kode_service='$kdKartu' LIMIT 0,1;");
    return $this -> st -> querySingle();
  }

  public function getMembersData($pelanggan)
  {
    $this -> st -> query("SELECT nama_lengkap, level FROM tbl_pelanggan WHERE username='$pelanggan' LIMIT 0,1;");
    return $this -> st -> querySingle();
  }

  public function totalHarga($kdKartu)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kdKartu';");
    return $this -> st -> queryAll();
  }

  public function jumlahItem($kdKartu)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kdKartu';");
    return $this -> st -> numRow();
  }

  public function listProduk()
  {
    $this -> st -> query("SELECT * FROM tbl_service WHERE aktif='y';");
    return $this -> st -> queryAll();
  }

}