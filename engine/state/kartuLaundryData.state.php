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
    $query = "INSERT INTO tbl_kartu_laundry VALUES (null, :kode_service, :pelanggan, :waktu_mulai, '0000-00-00 00:00:00','0000-00-00 00:00:00','pending','$operator', 'hold');";
    $this -> st -> query($query);
    $this -> st -> querySet('kode_service', $kode);
    $this -> st -> querySet('pelanggan', $pelanggan);
    $this -> st -> querySet('waktu_mulai', $waktuMasuk);
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
 
}  