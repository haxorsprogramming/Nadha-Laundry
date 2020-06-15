<?php

class laporanTransaksiData{
  
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getTahunRelease()
  {
    $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='tahun_release';");
    return $this -> st -> querySingle();
  }

  public function jlhTransaksiMasuk($tahunAwalKomplit, $tahunAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwalKomplit' AND '$tahunAkhirKomplit') AND arus='masuk';");
    return $this -> st -> numRow();
  }

  public function getTransaksiMasuk($tahunAwalKomplit, $tahunAkhirKomplit)
  {
     $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwalKomplit' AND '$tahunAkhirKomplit') AND arus='masuk';");
     return $this -> st -> queryAll();
  }

  public function jlhTransaksiKeluar($tahunAwalKomplit, $tahunAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwalKomplit' AND '$tahunAkhirKomplit') AND arus='keluar';");
    return $this -> st -> numRow();
  }

  public function getTransaksiKeluar($tahunAwalKomplit, $tahunAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwalKomplit' AND '$tahunAkhirKomplit') AND arus='keluar';");
    return $this -> st -> queryAll();
  }

  public function blnJlhTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return $this -> st -> numRow();
  }

  public function blnGetTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return $this -> st -> queryAll();
  }

  public function blnJlhTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> numRow();
  }

  public function blnGetTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> queryAll();
  }

  public function getRekapTransaksi($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit');");
    return $this -> st -> queryAll();
  }

  public function jlhRekapTransaksi($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit');");
    return $this -> st -> numRow();
  }

  public function thnGetTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return $this -> st -> queryAll();
  }

  public function thnJlhTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
    return $this -> st -> numRow();
  }

  public function thnJlhTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> numRow();
  }

  public function thnGetTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit)
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
    return $this -> st -> queryAll();
  }

}