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

}