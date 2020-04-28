<?php

class laundryRoom extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

   public function index()
   {
    $this -> cekUserLogin('userSes');
    $this -> st -> query("SELECT * FROM tbl_laundry_room WHERE status !='finish' ORDER BY id DESC;");
    $data['laundryRoom'] = $this -> st -> queryAll();
    $this -> bind('dasbor/laundryRoom/laundryRoom', $data);
   }

   public function detailCucian()
   {
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
       $waktu = $this -> waktu();
       $total = $hargaAt * $qt;
       $operator = $this -> getses('userSes');
       $queryToTemp = "INSERT INTO tbl_temp_item_cucian VALUES(null, '$kdTemp', '$kdRegistrasi', '$kdService', '$hargaAt', '$qt', '$total');";
       $this -> st -> query($queryToTemp);
       $this -> st -> queryRun();
       $qUpdate = "UPDATE tbl_laundry_room SET status='cuci' WHERE kd_kartu='$kdRegistrasi';";
       $this -> st -> query($qUpdate);
       $this -> st -> queryRun();
       $qUpdateReg = "UPDATE tbl_kartu_laundry SET status='cuci' WHERE kode_service='$kdRegistrasi';";
       $this -> st -> query($qUpdateReg);
       $this -> st -> queryRun();
       //proses update timeline
       $this -> st -> query("SELECT id FROM tbl_timeline WHERE kd_service='$kdRegistrasi' AND kd_event='mulai_cuci';");
       $jlhTimeLine = $this -> st -> numRow();
       if($jlhTimeLine < 1){
        $kdTimeline = $this -> rnstr(15);
        $qUpdateTimelineAwal = "INSERT INTO tbl_timeline VALUES(null,'$kdTimeline','$kdRegistrasi','$waktu','$operator','mulai_cuci','Cucian masuk laundry room');";
        $this -> st -> query($qUpdateTimelineAwal);
        $this -> st -> queryRun();
       }else{ }
       
       $data['status'] = 'sukses';
       $this -> toJson($data);
   }

   public function getItemService()
   {
       $dbdata = array();
       $kdRegistrasi = $this -> inp('kdRegistrasi');
       $this -> st -> query("SELECT * FROM tbl_temp_item_cucian WHERE kd_room='$kdRegistrasi';");
       $dIts = $this -> st -> queryAll();
       foreach($dIts as $dis){
        $kdItem = $dis['kd_item'];
        $this -> st -> query("SELECT nama FROM tbl_service WHERE kd_service='$kdItem' LIMIT 0,1;");
        $dNamaProd = $this -> st -> querySingle();
        $arrTemp['kd_item'] = $dis['kd_item']; 
        $arrTemp['qt'] = $dis['qt'];
        $arrTemp['namaCap'] = $dNamaProd['nama'];
        $arrTemp['total'] = $dis['total'];
        $dbdata[] = $arrTemp;
       } 
       $this -> toJson($dbdata);
   }

   public function setCucianSelesai()
   {
       $kdService = $this -> inp('kdService');
       $waktuSelesai = $this -> waktu();
       $operator = $this -> getses('userSes');
       //update status cucian menjadi selesai 
       $qUpdate = "UPDATE tbl_laundry_room SET status='finish' WHERE kd_kartu='$kdService';";
       $this -> st -> query($qUpdate);
       $this -> st -> queryRun();
       $qUpdateKartu = "UPDATE tbl_kartu_laundry SET status='finishcuci', waktu_selesai='$waktuSelesai' WHERE kode_service='$kdService'";
       $this -> st -> query($qUpdateKartu);
       $this -> st -> queryRun();
       //cari keseluruhan harga 
       $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kdService';");
       $fHargaTotal = $this -> st -> queryAll();
       $hargaAwal = 0;
       foreach($fHargaTotal as $qHar){
        $hargaTemp = $qHar['total'];
        $hargaAwal = $hargaAwal + $hargaTemp;
       }
       //update ke cucian 
       $qUpdateHargaCucian = "UPDATE tbl_laundry_room SET total_harga='$hargaAwal' WHERE kd_kartu='$kdService';";
       $this -> st -> query($qUpdateHargaCucian);
       $this -> st -> queryRun();
       //update timeline 
       $kdTimeline = $this -> rnstr(15);
       $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline', '$kdService', '$waktuSelesai','$operator','cucian_selesai','Cucian telah selesai');";
       $this -> st -> query($qUpdateTimeline);
       $this -> st -> queryRun();
       $this -> toJson($kdService);
   }

}
