<?php

class pengaturanUmumData{
  
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getDataPengaturan()
  {
    $this -> st -> query("SELECT * FROM tbl_setting_laundry;");
    return $this -> st -> queryAll();
  }

  public function formEditPengaturan($kdSetting)
  {
    $this -> st -> query("SELECT * FROM tbl_setting_laundry WHERE kd_setting='$kdSetting';");
    return $this -> st -> querySingle();
  }

  public function prosesEditPengaturan($value, $kdSetting)
  {
    $qEdit = "UPDATE tbl_setting_laundry SET value='$value' WHERE kd_setting='$kdSetting';";
    $this -> st -> query($qEdit);
    $this -> st -> queryRun();
  }

}