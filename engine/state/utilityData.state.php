<?php

class utilityData{
   
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getLaundryName()
  {
    $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='laundry_name' LIMIT 0,1;");
    $qNamaLaundry = $this -> st -> querySingle();
  }

}