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

  public function getNamaPelanggan($username)
  {
    $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$username';");
    return $this -> st -> querySingle();
  }

  public function jumlahPick($kodeService)
  {
    $this -> st -> query("SELECT id FROM tbl_timeline WHERE kd_service='$kodeService' AND kd_event='pick_up';");
    return $this -> st -> numRow();
  }

  public function jumlahTemp($kodeService)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kodeService';");
    return $this -> st -> numRow();
  }

  public function dataTemp($kodeService)
  {
    $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kodeService';");
    return $this -> st -> queryAll();
  }

  public function listPelanggan()
  {
    $this -> st -> query("SELECT username, nama_lengkap, email FROM tbl_pelanggan ORDER BY id DESC;");
    return $this -> st -> queryAll();
  }

  public function prosesRegistrasiCucian($kode, $pelanggan, $waktuMasuk, $operator)
  {
    $query = "INSERT INTO tbl_kartu_laundry VALUES (null, '$kode', '$pelanggan', '$waktuMasuk', null, null, 'pending', '$operator', 'hold');";
    $this -> st -> query($query);
    $this -> st -> queryRun();
  }

  public function insertLaundryRoom($kodeRoom, $kode, $operator)
  {
    $queryToRoom = "INSERT INTO tbl_laundry_room VALUES(null, '$kodeRoom', '$kode', '0', '$operator', 'ready');";
    $this -> st -> query($queryToRoom);
    $this -> st -> queryRun();
  }

  public function insertTimeLine($kdTimeline, $kode, $waktuMasuk, $operator)
  {
    $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline','$kode','$waktuMasuk','$operator','registrasi_cucian','Cucian di registrasi');";
    $this -> st -> query($qUpdateTimeline);
    $this -> st -> queryRun();
  }

  public function getKartuLaundry($kdService)
  {
    $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
    return $this -> st -> querySingle();
  }

  public function getTimeline($kdService)
  {
    $this -> st -> query("SELECT * FROM tbl_timeline WHERE kd_service='$kdService';");
    return $this -> st -> queryAll();
  }

  public function updateKartuLaundry($waktuPickUp, $kdService)
  {
    $qUpdatePickUp = "UPDATE tbl_kartu_laundry SET waktu_diambil='$waktuPickUp' WHERE kode_service='$kdService';";
    $this -> st -> query($qUpdatePickUp);
    $this -> st -> queryRun();
  }

  public function updateTimelinePickup($kdTimeline, $kdService, $waktuPickUp, $operator)
  {
    $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline','$kdService','$waktuPickUp','$operator','pick_up','Cucian telah diambil');";
    $this -> st -> query($qUpdateTimeline);
    $this -> st -> queryRun();
  }

  public function batalkanCucian($kdService)
  {
     //hapus di kartu laundry
     $qDeleteKartuLaundry = "DELETE FROM tbl_kartu_laundry WHERE kode_service='$kdService';";
     $this -> st -> query($qDeleteKartuLaundry);
     $this -> st -> queryRun();
     //hapus di laundry room 
     $qDeleteLaundryRoom = "DELETE FROM tbl_laundry_room WHERE kd_kartu='$kdService';";
     $this -> st -> query($qDeleteLaundryRoom);
     $this -> st -> queryRun();
     //hapus di temp item cucian 
     $qDeleteTempCucian = "DELETE FROM tbl_temp_item_cucian WHERE kd_room='$kdService';";
     $this -> st -> query($qDeleteTempCucian);
     $this -> st -> queryRun();
     //hapus di timeline 
     $qDeleteTimeline = "DELETE FROM tbl_timeline WHERE kd_service=$kdService'';";
     $this -> st -> query($qDeleteTimeline);
     $this -> st -> queryRun();
  }
 
}  