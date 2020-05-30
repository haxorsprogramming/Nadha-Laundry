<?php

class dashboard{
  
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

  public function levelUserLogin($user)
  {
    $this -> st -> query("SELECT tipe_user FROM tbl_user WHERE username='$user';");
    return $this -> st -> querySingle();
  }

  public function rankPelanggan()
  {
    $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY poin_real DESC LIMIT 0, 6;");
    return $this -> st -> queryAll();
  }

  public function jlhTransaksiHarian($waktuStart, $waktuAkhir)
  {
    $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE (waktu BETWEEN '$waktuStart' AND '$waktuAkhir');");
    return $this -> st -> numRow();
  }

  public function jlhTransaksiPelanggan($username)
  {
    $this -> st -> query("SELECT id FROM tbl_kartu_laundry WHERE pelanggan='$username';");
    return $this -> st -> numRow();
  }

  public function transaksiTanggal($tglStart, $tglAkhir)
  {
    $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE (waktu BETWEEN '$tglStart' AND '$tglAkhir');");
    return $this -> st -> queryAll();
  }

  public function totalTransaksiTanggal($tglStart, $tglAkhir)
  {
    $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE (waktu BETWEEN '$tglStart' AND '$tglAkhir');");
    return $this -> st -> numRow();
  }

}