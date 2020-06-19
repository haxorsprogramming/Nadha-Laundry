<?php

class pembayaran extends Route{

    private $sn = 'pembayaranData';

    public function index()
    {
        echo "<pre>route_pembayaran</pre>";
    }

    public function formPembayaran($kd)
    {
        $data['kartuRegistrasi']    = $this -> state($this -> sn) -> getKartuLaundry($kd);
        //ke form pembayaran
        $this -> bind('dasbor/pembayaran/formPembayaran', $data);
    }

    public function getInfoItem()
    {
       $dbdata          = array();
       $kdRegistrasi    = $this -> inp('kdService');
       $dIts            = $this -> state($this -> sn) -> getItemCucian($kdRegistrasi);
       //looping
       foreach($dIts as $dis){
        $kdItem             = $dis['kd_item'];
        $dNamaProd          = $this -> state($this -> sn) -> getNamaService($kdItem);
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
        $jp = $this -> state($this -> sn) -> jlhPromoCode($kd);
        if($jp < 1){
            $data['status'] = 'kode_invalid';
        }else{
            //ambil data promo code
            $qPromo         = $this -> state($this -> sn) -> getPromo($kd);
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
        $qTotal         = $this -> state($this -> sn) -> getTempCucian($kdService);
        $total          = 0;
        foreach($qTotal as $qt){
            $totalTemp  = $qt['total'];
            $total      = $total + $totalTemp;
        }
        //cari diskon 
        $hargaFixDiskon     = $diskonLevel * $total / 100;
        $hargaAfterDiskon   = $total - $hargaFixDiskon;
        //hitung diskon lewat promo 
        $jp                 = $this -> state($this -> sn) ->  jlhPromo($kdPromo);
        if($jp < 1){
            $diskonPromo = 0;
        }else{
            $qPromo         = $this -> state($this -> sn) ->  qPromo($kdPromo);
            $diskonPromo    = $qPromo['disc'];
        }
        $hargaFixDiskonPromo    = $diskonPromo * $hargaAfterDiskon / 100;
        $hargaAfterFiskonPromo  = $hargaAfterDiskon - $hargaFixDiskonPromo;
        $diskonTotal            = $hargaFixDiskon + $hargaFixDiskonPromo;
        $this -> state($this -> sn) -> simpanPembayaran($kdTransaksi, $kdService, $waktu, $total, $diskonTotal, $kdPromo, $hargaAfterFiskonPromo, $tunai, $operator);
        //insert ke tbl_arus kas
        $kdKas      = $this -> rnstr(15);
        $asal       = 'pembayaran_cucian';
        $arus       = 'masuk';
        $waktuTemp  = $this -> waktu();
        // $operator = 'admin';
        $this -> state($this -> sn) -> simpanArusKas($kdKas, $kdTransaksi, $asal, $arus, $hargaAfterFiskonPromo, $waktuTemp, $operator);
        //update status pembayaran di kartu laundry
        $this -> state($this -> sn) -> updateStatusPembayaran($kdService);
        //update point pengguna
        //cari jumlah bonus point melalui level
        $qDataKartuLaundrySet   = $this -> state($this -> sn) -> getUsernameKartuLaundry($kdService);
        $usernamePelanggan      = $qDataKartuLaundrySet['pelanggan'];
        $qLevelPelanggan        = $this -> state($this -> sn) ->  getLevelPelanggan($usernamePelanggan);
        $levelPelanggan         = $qLevelPelanggan['level'];
        $qBonusPointCuci        = $this -> state($this -> sn) -> getBonusCuci($levelPelanggan);
        $bonusPointCuci         = $qBonusPointCuci['bonus_point_cuci'];
        //ambil point lama pelanggan 
        $qPoinReal              = $this -> state($this -> sn) ->  getPoinPelanggan($usernamePelanggan);
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
        $data['dataTransaksi']  = $this -> state($this -> sn) -> detailPembayaran($kdTransaksi);
        $this -> bind('dasbor/pembayaran/detailPembayaran', $data);
    }

}
