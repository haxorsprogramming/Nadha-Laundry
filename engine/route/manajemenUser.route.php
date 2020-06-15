<?php

class manajemenUser extends Route{

   private $sn = 'manajemenUserData';

   public function index()
   {
        $this -> cekUserLogin('userSes','login');
        $this -> bind('dasbor/manajemenUser/manajemenUser');
   }

   public function getListUser()
   {
        $dbdata             = array();
        $data['dataUser']   = $this -> state($this -> sn) -> getListUser();
        foreach($data['dataUser'] as $dis){
            $arrTemp['username']    = $dis['username'];
            $arrTemp['tipeUser']    = $dis['tipe_user'];
            $arrTemp['lastLogin']   = $dis['last_login'];
            $dbdata[]               = $arrTemp;
        }
        $this -> toJson($dbdata);
   }
 
   public function formTambahUser()
   {
       $this -> bind('dasbor/manajemenUser/formTambahUser');
   }

   public function prosesTambahUser()
   {
        $username       = $this -> inp('username');
        $password       = md5($this -> inp('password'));
        $tipeUser       = $this -> inp('tipeUser');
        $waktu          = $this -> waktu();
        $this -> state($this -> sn) -> prosesTambahUser($username, $password, $waktu, $tipeUser);
        $data['status'] = 'sukses';
        $this -> toJson($data);
   }

   public function hapusUser()
   {
       $username        = $this -> inp('username');
       $this -> state($this -> sn) -> hapusUser($username);
       $data['status']  = 'sukses';
       $this -> toJson($data);
   }


}