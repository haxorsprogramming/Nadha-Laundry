<?php

class manajemenUserData{
  
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function getListUser()
  {
    $this -> st -> query("SELECT * FROM tbl_user;");
    return $this -> st -> queryAll();
  }

}