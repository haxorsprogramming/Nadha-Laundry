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

  public function getInfoProduk($kdProduk)
  {
    $this -> st -> query("SELECT * FROM tbl_service WHERE kd_service='$kdProduk';");
    return $this -> st -> querySingle();
  }

  public function insertTempCucian($kdTemp, $kdRegistrasi, $kdService, $hargaAt, $qt, $total)
  {
    $queryToTemp = "INSERT INTO tbl_temp_item_cucian VALUES(null, '$kdTemp', '$kdRegistrasi', '$kdService', '$hargaAt', '$qt', '$total');";
    $this -> st -> query($queryToTemp);
    $this -> st -> queryRun();
  }

  public function updateLaundryRoom($kdRegistrasi)
  {
    $qUpdate = "UPDATE tbl_laundry_room SET status='cuci' WHERE kd_kartu='$kdRegistrasi';";
    $this -> st -> query($qUpdate);
    $this -> st -> queryRun();
  }

  public function updateKartuLaundry($kdRegistrasi)
  {
    $qUpdateReg = "UPDATE tbl_kartu_laundry SET status='cuci' WHERE kode_service='$kdRegistrasi';";
    $this -> st -> query($qUpdateReg);
    $this -> st -> queryRun();
  }

  public function jumlahTimeline($kdRegistrasi)
  {
    $this -> st -> query("SELECT id FROM tbl_timeline WHERE kd_service='$kdRegistrasi' AND kd_event='mulai_cuci';");
    return $this -> st -> numRow();
  }

  public function insertTimeline($kdTimeline, $kdRegistrasi, $waktu, $operator)
  {
    $qUpdateTimelineAwal = "INSERT INTO tbl_timeline VALUES(null,'$kdTimeline','$kdRegistrasi','$waktu','$operator','mulai_cuci','Cucian masuk laundry room');";
    $this -> st -> query($qUpdateTimelineAwal);
    $this -> st -> queryRun();
  }

  public function getTempCucian($kdRegistrasi)
  {
    $this -> st -> query("SELECT * FROM tbl_temp_item_cucian WHERE kd_room='$kdRegistrasi';");
    return $this -> st -> queryAll();
  }

  public function getServiceData($kdItem)
  {
    $this -> st -> query("SELECT nama FROM tbl_service WHERE kd_service='$kdItem' LIMIT 0,1;");
    return $this -> st -> querySingle();
  }

  public function updateKartuNRoomLaundry($kdService, $waktuSelesai)
  {
    $qUpdate = "UPDATE tbl_laundry_room SET status='finish' WHERE kd_kartu='$kdService';";
    $this -> st -> query($qUpdate);
    $this -> st -> queryRun();
    $qUpdateKartu = "UPDATE tbl_kartu_laundry SET status='finishcuci', waktu_selesai='$waktuSelesai' WHERE kode_service='$kdService'";
    $this -> st -> query($qUpdateKartu);
    $this -> st -> queryRun();
  }

  public function totalTempHarga($kdService)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kdService';");
    return $this -> st -> queryAll();
  }

  public function updateHargaCucian($hargaAwal, $kdService)
  {
    $qUpdateHargaCucian = "UPDATE tbl_laundry_room SET total_harga='$hargaAwal' WHERE kd_kartu='$kdService';";
    $this -> st -> query($qUpdateHargaCucian);
    $this -> st -> queryRun();
  }

  public function updateTimeline($kdTimeline, $kdService, $waktuSelesai, $operator)
  {
    $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline', '$kdService', '$waktuSelesai','$operator','cucian_selesai','Cucian telah selesai');";
    $this -> st -> query($qUpdateTimeline);
    $this -> st -> queryRun();
  }

  public function emailHost()
  {
    $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='email_host';");
    return $this -> st -> querySingle();
  }

  public function passwordHost()
  {
    $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='email_host_password';");
    return $this -> st -> querySingle();
  }

  public function getUsernamePelanggan($kdService)
  {
    $this -> st -> query("SELECT pelanggan FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
    return $this -> st -> querySingle();
  }

  public function getDataPelanggan($username)
  {
    $this -> st -> query("SELECT nama_lengkap, email, hp FROM tbl_pelanggan WHERE username='$username';");
    return $this -> st -> querySingle();
  }

  public  function dataKartuLaundry()
  {
    $this -> st -> query("SELECT * FROM tbl_kartu_laundry ORDER BY id DESC;");
    return $this -> st -> queryAll();
  }

  public function getDataPelangganCucian($kd)
  {
    $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kd' LIMIT 0,1;");
    return $this -> st -> querySingle();
  }

  public function getNamaPelanggan($pelanggan)
  {
    $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$pelanggan' LIMIT 0,1;");
    return  $this -> st -> querySingle();
  }

  public function getJumlahCucianDetail($kd)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kd';");
    return $this -> st -> numRow();
  }

  public function getDataCucianDetail($kd)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kd';");
    return $this -> st -> queryAll();
  }

  public function getApiKey()
  {
    $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='api_key_wa';");
    return $this -> st -> querySingle();
  }

}