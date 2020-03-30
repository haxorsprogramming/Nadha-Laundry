<?php

class laundryRoom extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

   public function index()
   {
    $this -> cekUserLogin('userSes');
    $this -> st -> query("SELECT * FROM tbl_laundry_room WHERE status!='finish' ORDER BY id DESC;");
    $data['laundryRoom'] = $this -> st -> queryAll();
    $this -> bind('dasbor/laundryRoom/laundryRoom', $data);
   }

   public function detailCucian(){
       $this -> cekUserLogin('userSes');
       $this -> st -> query("SELECT * FROM tbl_service WHERE aktif='y';");
       $data['listProduk'] = $this -> st -> queryAll();
       $data['kd'] = $this -> inp('kd');
       $this -> bind('dasbor/laundryRoom/detailCucian', $data);
   }

   public function getInfoProduk(){
       $kdProduk = $this -> inp('kdProduk');
       $this -> st -> query("SELECT * FROM tbl_service WHERE kd_service='$kdProduk';");
       $dProduk = $this -> st -> querySingle();
       $this -> toJson($dProduk);
   }

   public function prosesTambahItem()
   {
    // 'kdReg': kdRegistrasi, 'serviceKd':serviceKd, 'qt': qt
       $kdRegistrasi = $this -> inp('kdReg');
       $kdService = $this -> inp('serviceKd');
       $hargaAt = $this -> inp('hargaAt');
       $qt = $this -> inp('qt');
       $kdTemp = $this -> rnstr(10);
       $total = $hargaAt * $qt;
       $queryToTemp = "INSERT INTO tbl_temp_item_cucian VALUES(null, '$kdTemp', '$kdRegistrasi', '$kdService', '$hargaAt', '$qt', '$total');";
       $this -> st -> query($queryToTemp);
       $this -> st -> queryRun();
       
        $data['status'] = 'sukses';
       $this -> toJson($data);
   }

}
