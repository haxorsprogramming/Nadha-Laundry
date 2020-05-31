<?php

class pelangganData{
  
 private $tbl = 'tbl_pelanggan';
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function pelangganDataAll()
  {
  //  $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY id DESC;");
   return "12";
  }

}