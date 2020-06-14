<?php

class broadcastPesanData{

 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getBroadcastData()
  {
    $this -> st -> query("SELECT * FROM tbl_broadcast_pesan;");
    return $this -> st -> queryAll();
  }

  public function getPelanggan()
  {
      $this -> st -> query("SELECT * FROM tbl_pelanggan;");
      return $this -> st -> queryAll();
  }

  public function simpanBroadcast($idPesan, $judulPesan, $isiPesan, $tipeProses, $waktu, $status)
  {
      $query = "INSERT INTO tbl_broadcast_pesan VALUES(null, '$idPesan', '$judulPesan','$isiPesan','$tipeProses','$waktu','$status');";
      $this -> st -> query($query);
      $this -> st -> queryRun();
  }

}