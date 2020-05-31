<?php

class pelangganData{
  
 private $tbl = 'tbl_pelanggan';
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function pelangganDataAll()
  {
   $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY id DESC;");
   return $this -> st -> queryAll();
  }

  public function statusCucianPelanggan($username)
  {
    $this -> st -> query("SELECT id FROM tbl_kartu_laundry WHERE pelanggan='$username' AND status='cuci';");
    return $this -> st -> numRow();
  }

  public function jumlahCucianPelanggan($username)
  {
    $this -> st -> query("SELECT id FROM tbl_kartu_laundry WHERE pelanggan='$username';");
    return $this -> st -> numRow();
  }

  public function historyKartuLaundryPelanggan($username)
  {
    $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE pelanggan='$username';");
    return $this -> st -> queryAll();
  }

  public function profilePelanggan($usernameParam)
  {
    $this -> st -> query("SELECT * FROM tbl_pelanggan WHERE username='$usernameParam' LIMIT 0,1;");
    return $this -> st -> querySingle();
  }

  public function transaksiTerakhirPelanggan($usernameParam)
  {
    $this -> st -> query("SELECT waktu_masuk FROM tbl_kartu_laundry WHERE pelanggan='$usernameParam' ORDER BY waktu_masuk DESC;");
    return $this -> st -> querySingle();
  }

  public function pelangganProfileData($usernameParam)
  {
    $this -> st -> query("SELECT * FROM tbl_pelanggan WHERE username='$usernameParam';");
    return $this -> st -> querySingle();
  }

  public function dataLevelPelanggan()
  {
    $this -> st -> query("SELECT * FROM tbl_level_user;");
    return $this -> st -> queryAll();
  }

}