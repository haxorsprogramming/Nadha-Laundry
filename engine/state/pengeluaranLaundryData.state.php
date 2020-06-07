<?php

class pengeluaranLaundryData{
  
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function dataPengeluaran()
  {
    $this -> st -> query("SELECT * FROM tbl_pengeluaran;");
    return $this -> st -> queryAll();
  }

  public function prosesTambahPengeluaran($kd, $nama, $deks, $tanggal, $jumlah, $operator)
  {
    $qSimpan = "INSERT INTO tbl_pengeluaran VALUES(null, '$kd', '$nama', '$deks', '$tanggal', '$jumlah', '$operator');";
    $this -> st -> query($qSimpan);
    $this -> st -> queryRun();
  }

  public function simpanArusKas($kdKas, $kd, $asal, $arus, $jumlah, $waktuTemp, $operator)
  {
    $qSimpanKeArusKas = "INSERT INTO tbl_arus_kas VALUES(null, '$kdKas', '$kd', '$asal', '$arus', '$jumlah', '$waktuTemp', '$operator');";
    $this -> st -> query($qSimpanKeArusKas);
    $this -> st -> queryRun();
  }

  public function hapusPengeluaran($kdPengeluaran)
  {
    $qHapusPembayaran = "DELETE FROM tbl_pengeluaran WHERE kd_pengeluaran='$kdPengeluaran';";
    $this -> st -> query($qHapusPembayaran);
    $this -> st -> queryRun();
  }

  public function hapusArusKas($kdPengeluaran)
  {
    $qHapusArusKas = "DELETE FROM tbl_arus_kas WHERE kd_tracking='$kdPengeluaran';";
    $this -> st -> query($qHapusArusKas);
    $this -> st -> queryRun();
  }


}