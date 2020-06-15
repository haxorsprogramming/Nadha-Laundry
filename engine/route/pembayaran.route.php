<?php

class pembayaran extends Route{

    public function index()
    {
        echo "<pre>route_pembayaran</pre>";
    }

    public function formPembayaran()
    {
        $kd                         = $this -> inp('kdReg');
        $data['kartuRegistrasi']    = $this -> state('pembayaranData') -> getKartuLaundry($kd);
        //ke form pembayaran
        $this -> bind('dasbor/pembayaran/formPembayaran', $data);
    }

    public function getInfoItem()
    {
       $dbdata          = array();
       $kdRegistrasi    = $this -> inp('kdService');
       $dIts            = $this -> state('pembayaranData') -> getItemCucian($kdRegistrasi);
       //looping
       foreach($dIts as $dis){
        $kdItem             = $dis['kd_item'];
        $dNamaProd          = $this -> state('pembayaranData') -> getNamaService($kdItem);
        $arrTemp['kd_item'] = $dis['kd_item']; 
        $arrTemp['qt']      = $dis['qt'];
        $arrTemp['namaCap'] = $dNamaProd['nama'];
        $arrTemp['total']   = $dis['total'];
        $dbdata[]           = $arrTemp;
       } 
       $this -> toJson($dbdata);
    }

    public function getPromoData()
    {
        $kd = $this -> inp('kdPromo');
        //cek apakah kode valid 
        $jp = $this -> state('pembayaranData') -> jlhPromoCode($kd);
        if($jp < 1){
            $data['status'] = 'kode_invalid';
        }else{
            //ambil data promo code
            $qPromo         = $this -> state('pembayaranData') -> getPromo($kd);
            $data['deks']   = $qPromo['deks'];
            $data['diskon'] = $qPromo['disc'];
        }
        $this -> toJson($data);
    }

    public function cekPromo(){
        $tanggalSekarang    = strtotime(date("Y-m-d"));
        $tanggalNanti       = strtotime("2019-03-21");
        $diff               = abs($tanggalSekarang - $tanggalNanti); 
        $tahun              = floor($diff / (365*60*60*24));
        $bulan              = floor(($diff - $tahun * 365*60*60*24) / (30*60*60*24));  
        $hari               = floor(($diff - $tahun * 365*60*60*24 - $bulan*30*60*60*24)/ (60*60*24)); 
    }

    public function prosesPembayaran()
    {
        $waktu          = $this -> waktu();
        $kdPromo        = $this -> inp('kdPromo');
        $kdTransaksi    = $this -> inp('kdTransaksi');
        $kdService      = $this -> inp('kdService');
        $diskonLevel    = $this -> inp('diskonLevel');
        $tunai          = $this -> inp('tunai');
        $operator       = $this -> getses('userSes');
        //cari total cucian 
        $qTotal         = $this -> state('pembayaranData') -> getTempCucian($kdService);
        $total          = 0;
        foreach($qTotal as $qt){
            $totalTemp  = $qt['total'];
            $total      = $total + $totalTemp;
        }
        //cari diskon 
        $hargaFixDiskon     = $diskonLevel * $total / 100;
        $hargaAfterDiskon   = $total - $hargaFixDiskon;
        //hitung diskon lewat promo 
        $jp                 = $this -> state('pembayaranData') ->  jlhPromo($kdPromo);
        if($jp < 1){
            $diskonPromo = 0;
        }else{
            $qPromo         = $this -> state('pembayaranData') ->  qPromo($kdPromo);
            $diskonPromo    = $qPromo['disc'];
        }
        $hargaFixDiskonPromo = $diskonPromo * $hargaAfterDiskon / 100;
        $hargaAfterFiskonPromo = $hargaAfterDiskon - $hargaFixDiskonPromo;
        $diskonTotal = $hargaFixDiskon + $hargaFixDiskonPromo;
        $qSimpanPembayaran = "INSERT INTO tbl_pembayaran VALUES(null,'$kdTransaksi','$kdService','$waktu','$total','$diskonTotal','$kdPromo','$hargaAfterFiskonPromo','$tunai','$operator');";
        $this -> st -> query($qSimpanPembayaran);
        $this -> st -> queryRun();
        //insert ke tbl_arus kas
        $kdKas = $this -> rnstr(15);
        $asal = 'pembayaran_cucian';
        $arus = 'masuk';
        $waktuTemp = $this -> waktu();
        // $operator = 'admin';
        $qSimpanKeArusKas = "INSERT INTO tbl_arus_kas VALUES(null, '$kdKas', '$kdTransaksi', '$asal', '$arus', '$hargaAfterFiskonPromo', '$waktuTemp', '$operator');";
        $this -> st -> query($qSimpanKeArusKas);
        $this -> st -> queryRun();
        //update status pembayaran di kartu laundry
        $qUpdateStatus = "UPDATE tbl_kartu_laundry SET pembayaran='selesai' WHERE kode_service='$kdService';";
        $this -> st -> query($qUpdateStatus);
        $this -> st -> queryRun();
        //update point pengguna
        //cari jumlah bonus point melalui level
        $this -> st -> query("SELECT pelanggan FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
        $qDataKartuLaundrySet = $this -> st -> querySingle();
        $usernamePelanggan = $qDataKartuLaundrySet['pelanggan'];
        $this -> st -> query("SELECT level FROM tbl_pelanggan WHERE username='$usernamePelanggan';");
        $qLevelPelanggan = $this -> st -> querySingle();
        $levelPelanggan = $qLevelPelanggan['level'];
        $this -> st -> query("SELECT bonus_point_cuci FROM tbl_level_user WHERE kd_level='$levelPelanggan';");
        $qBonusPointCuci = $this -> st -> querySingle();
        $bonusPointCuci = $qBonusPointCuci['bonus_point_cuci'];
        //ambil point lama pelanggan 
        $this -> st -> query("SELECT poin_real FROM tbl_pelanggan WHERE username='$usernamePelanggan';");
        $qPoinReal = $this -> st -> querySingle();
        $poinReal = $qPoinReal['poin_real'];
        $poinBaru = $poinReal + $bonusPointCuci;
        //update ke point pelanggan
        $qUpdatePoint = "UPDATE tbl_pelanggan SET poin_real='$poinBaru' WHERE username='$usernamePelanggan';";
        $this -> st -> query($qUpdatePoint);
        $this -> st -> queryRun();
        //update timeline 
        $kdTimeline = $this -> rnstr(15);
        $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline','$kdService','$waktu','$operator','pembayaran_selesai','Pembayaran telah dilakukan');";
        $this -> st -> query($qUpdateTimeline);
        $this -> st -> queryRun();
        //notifikasi ke pelanggan         
        $data['status'] = 'sukses';
        $this -> toJson($data);

    }

    public function detailPembayaran()
    {
        $kdTransaksi = $this -> inp('kdTransaksi');
        $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE kd_pembayaran='$kdTransaksi';");
        $data['dataTransaksi'] = $this -> st -> querySingle();
        $this -> bind('dasbor/pembayaran/detailPembayaran', $data);
    }

}
