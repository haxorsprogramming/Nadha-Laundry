<?php

class manajemenUser extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

   public function index()
   {
    $this -> cekUserLogin('userSes');
    $this -> bind('dasbor/manajemenUser/manajemenUser');
   }

   public function getListUser()
   {
    $dbdata = array();
    $this -> st -> query("SELECT * FROM tbl_user;");
    $data['dataUser'] = $this -> st -> queryAll();
    foreach($data['dataUser'] as $dis){
        $arrTemp['username'] = $dis['username'];
        $arrTemp['tipeUser'] = $dis['tipe_user'];
        $arrTemp['lastLogin'] = $dis['last_login'];
        $dbdata[] = $arrTemp;
    }
       $this -> toJson($dbdata);
   }

   public function hapusUser()
   {
       $username = $this -> inp('username');
       $qUpdate = "DELETE FROM tbl_user WHERE username='$username';";
       $this -> st -> query($qUpdate);
       $this -> st -> queryRun();
       $data['status'] = 'sukses';
       $this -> toJson($data);
   }

}