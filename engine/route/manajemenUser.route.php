<?php

class manajemenUser extends Route{

   
   public function index()
   {
    $this -> cekUserLogin('userSes','login');
    $this -> bind('dasbor/manajemenUser/manajemenUser');
   }

   public function getListUser()
   {
    $dbdata = array();
    $data['dataUser'] = $this -> state('manajemenUserData') -> getListUser();
    foreach($data['dataUser'] as $dis){
        $arrTemp['username'] = $dis['username'];
        $arrTemp['tipeUser'] = $dis['tipe_user'];
        $arrTemp['lastLogin'] = $dis['last_login'];
        $dbdata[] = $arrTemp;
    }
       $this -> toJson($dbdata);
   }
 
   public function formTambahUser()
   {
       $this -> bind('dasbor/manajemenUser/formTambahUser');
   }

   public function prosesTambahUser()
   {
        $username = $this -> inp('username');
        $password = md5($this -> inp('password'));
        $tipeUser = $this -> inp('tipeUser');
        $waktu = $this -> waktu();
        $qSimpanUser = "INSERT INTO tbl_user VALUES(null,'$username','$password','$waktu','$tipeUser','1');";
        $this -> st -> query($qSimpanUser);
        $this -> st -> queryRun();
        $data['status'] = 'sukses';
        $this -> toJson($data);
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