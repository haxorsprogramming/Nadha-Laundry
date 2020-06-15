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

  public function prosesTambahUser($username, $password, $waktu, $tipeUser)
  {
    $qSimpanUser = "INSERT INTO tbl_user VALUES(null,'$username','$password','$waktu','$tipeUser','1');";
    $this -> st -> query($qSimpanUser);
    $this -> st -> queryRun();
  }

  public function hapusUser($username)
  {
    $qUpdate = "DELETE FROM tbl_user WHERE username='$username';";
    $this -> st -> query($qUpdate);
    $this -> st -> queryRun();
  }

}