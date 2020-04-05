<?php

class pembayaran extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

    public function index()
    {
        echo "<pre>route_pembayaran</pre>";
    }

    public function formPembayaran()
    {
        $kd = $this -> inp('kdReg');
        $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kd';");
        $data['kartuRegistrasi'] = $this -> st -> querySingle();
        $this -> bind('dasbor/pembayaran/formPembayaran', $data);
    }

    public function getInfoItem()
    {
        $dbdata = array();
       $kdRegistrasi = $this -> inp('kdService');
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

    public function getPromoData()
    {
        $kd = $this -> inp('kdPromo');
        //cek apakah kode valid 
        $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kd' AND aktif='y' LIMIT 0,1;");
        $jp = $this -> st -> numRow();
        if($jp < 1){
            $data['status'] = 'kode_invalid';
        }else{
            //ambil data promo code
            $qPromo = $this -> st -> querySingle();
            $data['deks'] = $qPromo['deks'];
            $data['diskon'] = $qPromo['disc'];
        }
        $this -> toJson($data);
    }

    public function cekPromo(){
        $tanggalSekarang = strtotime(date("Y-m-d"));
        $tanggalNanti = strtotime("2019-03-21");
        $diff = abs($tanggalSekarang - $tanggalNanti); 
        $tahun = floor($diff / (365*60*60*24));
        $bulan = floor(($diff - $tahun * 365*60*60*24) / (30*60*60*24));  
        $hari = floor(($diff - $tahun * 365*60*60*24 - $bulan*30*60*60*24)/ (60*60*24)); 
          
    }

}
