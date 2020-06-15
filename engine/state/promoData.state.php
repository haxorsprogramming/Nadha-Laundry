<?php

class promoData{
   
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function dataPromo()
  {
    $this -> st -> query("SELECT * FROM tbl_promo_code WHERE aktif='y';");
    return $this -> st -> queryAll();
  }

  public function cekKodePromo($kdPromo)
  {
    $this -> st -> query("SELECT id FROM tbl_promo_code WHERE kd_promo='$kdPromo';");
    return $this -> st -> numRow();
  }

  public function prosesTambahPromo($kdPromo,$deks,$diskon)
  {
    $querySimpan = "INSERT INTO tbl_promo_code VALUES(null, '$kdPromo', '$deks','$diskon','2020-05-22','2020-05-22','100','y');";
    $this -> st -> query($querySimpan);
    $this -> st -> queryRun();
  }

  public function hapusPromo($kdPromo)
  {
    $queryHapus = "UPDATE tbl_promo_code SET aktif='n' WHERE kd_promo='$kdPromo';";
    $this -> st -> query($queryHapus);
    $this -> st -> queryRun();
  }

}