<?php

class arusKasData{
   
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getArusKas()
  {
    $this -> st -> query("SELECT * FROM tbl_arus_kas;");
    return $this -> st -> queryAll();
  }

}