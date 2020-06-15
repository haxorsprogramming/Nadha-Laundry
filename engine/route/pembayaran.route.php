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
        $hargaFixDiskonPromo    = $diskonPromo * $hargaAfterDiskon / 100;
        $hargaAfterFiskonPromo  = $hargaAfterDiskon - $hargaFixDiskonPromo;
        $diskonTotal            = $hargaFixDiskon + $hargaFixDiskonPromo;
        $this -> state('pembayaranData') -> simpanPembayaran($kdTransaksi, $kdService, $waktu, $total, $diskonTotal, $kdPromo, $hargaAfterFiskonPromo, $tunai, $operator);
        //insert ke tbl_arus kas
        $kdKas      = $this -> rnstr(15);
        $asal       = 'pembayaran_cucian';
        $arus       = 'masuk';
        $waktuTemp  = $this -> waktu();
        // $operator = 'admin';
        $this -> state('pembayaranData') -> simpanArusKas($kdKas, $kdTransaksi, $asal, $arus, $hargaAfterFiskonPromo, $waktuTemp, $operator);
        //update status pembayaran di kartu laundry
        $this -> state('pembayaranData') -> updateStatusPembayaran($kdService);
        //update point pengguna
        //cari jumlah bonus point melalui level
        $qDataKartuLaundrySet   = $this -> state('pembayaranData') -> getUsernameKartuLaundry($kdService);
        $usernamePelanggan      = $qDataKartuLaundrySet['pelanggan'];
        $qLevelPelanggan        = $this -> state('pembayaranData') ->  getLevelPelanggan($usernamePelanggan);
        $levelPelanggan         = $qLevelPelanggan['level'];
        $qBonusPointCuci        = $this -> state('pembayaranData') -> getBonusCuci($levelPelanggan);
        $bonusPointCuci         = $qBonusPointCuci['bonus_point_cuci'];
        //ambil point lama pelanggan 
        $qPoinReal              = $this -> state('pembayaranRoute') ->  getPoinPelanggan($usernamePelanggan);
        $poinReal               = $qPoinReal['poin_real'];
        $poinBaru               = $poinReal + $bonusPointCuci;
        //update ke point pelanggan
        $this -> state('pembayaranData') -> updatePoinPelanggan($poinBaru, $usernamePelanggan);
        //update timeline 
        $kdTimeline             = $this -> rnstr(15);
        $this -> state('pembayaranData') -> updateTimeLine($kdTimeline, $kdService, $waktu, $operator);
        //notifikasi ke pelanggan         
        $data['status']         = 'sukses';
        $this -> toJson($data);
    }

    public function detailPembayaran()
    {
        $kdTransaksi            = $this -> inp('kdTransaksi');
        $data['dataTransaksi']  = $this -> state('pembayaranData') -> detailPembayaran($kdTransaksi);
        $this -> bind('dasbor/pembayaran/detailPembayaran', $data);
    }

}
