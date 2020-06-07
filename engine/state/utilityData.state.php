<?php

class utilityData{
   
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getLaundryData($kdSetting)
  {
    $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='$kdSetting' LIMIT 0,1;");
    $dataRes = $this -> st -> querySingle();
    return $dataRes['value'];
  }

  public function getJumlahPelanggan()
  {
    $this -> st -> query("SELECT id FROM tbl_pelanggan;");
    return $this -> st -> numRow();
  }

  public function getJumlahCucian()
  {
    $this -> st -> query("SELECT id FROM tbl_laundry_room WHERE status='cuci';");
    return $this -> st -> numRow();
  }

  public function getInfoPelanggan($kodeService)
  {
    $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kodeService' LIMIT 0,1;");
    return $this -> st ->querySingle();
  }

  public function getDataPelanggan($pelanggan)
  {
    $this -> st -> query("SELECT nama_lengkap, email, alamat FROM tbl_pelanggan WHERE username='$pelanggan';");
    return $this -> st -> querySingle();
  }

}