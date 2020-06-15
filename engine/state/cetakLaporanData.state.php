<?php

class cetakLaporanData{
    
    private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getRekapTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return $this -> st -> queryAll();
  }

  public function getCountRekapTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return $this -> st -> numRow();
  }

  public function getRekapTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> queryAll();
  }

  public function getCountRekapTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> numRow();
  }

  public function jlhTransaksiBulan($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return $this -> st -> numRow();
  }

  public function getTransaksiBulan($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return  $this -> st -> queryAll();
  }

  public function jlhTransaksiBulanKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> numRow();
  }

  public function getTransaksiBulanKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> queryAll();
  }


}