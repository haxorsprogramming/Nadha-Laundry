<?php

class loginpage{
  
 private $tbl = 'tbl_user';
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function jlhUser($user, $passHash)
  {
    $this -> st -> query("SELECT id FROM tbl_user WHERE username='$user' AND password='$passHash';");
    return $this -> st -> numRow();
  }

  public function updateLogin($waktu, $user)
  {
    $query = "UPDATE tbl_user SET last_login='$waktu' WHERE username='$user';";
    $this -> st -> query($query);
    $this -> st -> queryRun();
  }
  
}