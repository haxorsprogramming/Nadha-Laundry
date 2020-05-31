<?php

class pelangganData{
  
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

  public function cekUsername($usernameFilter)
  {
    $this -> st -> query("SELECT id FROM tbl_pelanggan WHERE username='$usernameFilter';");
    return $this -> st -> numRow();
  }
  
  public function prosesTambahPelanggan($data,$usernameFilter)
  {
    $query = "INSERT INTO tbl_pelanggan VALUES (null, :username, :nama_lengkap, :alamat, :hp, :email, :level, 0, 0, '1',:waktu);";
    $this -> st -> query($query);
    $this -> st -> querySet('username',$usernameFilter);
    $this -> st -> querySet('nama_lengkap',$data['namaLengkap']);
    $this -> st -> querySet('alamat',$data['alamat']);
    $this -> st -> querySet('hp',$data['nomorHandphone']);
    $this -> st -> querySet('email',$data['email']);
    $this -> st -> querySet('level',$data['levelUser']);
    $this -> st -> querySet('waktu', $data['waktu']);
    $this -> st -> queryRun();
  }

  public function prosesUpdatePelanggan($data)
  {
    $query = "UPDATE tbl_pelanggan SET nama_lengkap=:nama_lengkap, alamat=:alamat, hp=:hp, email=:email, level=:level WHERE username=:username;";
    $this -> st -> query($query);
    $this -> st -> querySet('username',$data['username']);
    $this -> st -> querySet('nama_lengkap',$data['namaLengkap']);
    $this -> st -> querySet('alamat',$data['alamat']);
    $this -> st -> querySet('hp',$data['nomorHandphone']);
    $this -> st -> querySet('email',$data['email']);
    $this -> st -> querySet('level',$data['levelUser']);
    $this -> st -> queryRun();
  }

}