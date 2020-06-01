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
 
}