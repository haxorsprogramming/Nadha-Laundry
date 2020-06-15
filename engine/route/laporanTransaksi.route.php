<?php

class laporanTransaksi extends Route{

    private $sn = 'laporanTransaksiData';

    public function index()
    {
        $bulan              = date('m');
        $data['bulanIni']   = $bulan;
        $data['bulanIndo']  = $this -> bulanIndo($bulan);
        $data['jumlahHari'] = $this -> ambilHari($bulan);
        $this -> bind('dasbor/laporanTransaksi/laporanTransaksi', $data);
    }
    //ambil tahun relase awal
    public function getRelaseTahun()
    {
        $dbdata         = array(); 
        $qTahunRelase   = $this -> state($this -> sn) -> getTahunRelease();
        $tahunRelase    = $qTahunRelase['value'];
        $frekuensiTahun = 10;
        for($i = 0; $i <= 10; $i++){
            $tahunAwal          = $tahunRelase + $i;
            $tahunAkhir         = $tahunAwal + 1;
            $arrTemp['tahun']   = $tahunAwal;
            //cari total transaksi berdasarkan tahun 
            $tahunAwalKomplit   = $tahunAwal."-01-01 00:00:00";
            $tahunAkhirKomplit  = $tahunAwal."-12-31 23:59:59";
            //data transaksi masuk
            $arrTemp['jlhTransaksi'] = $this -> state($this -> sn) -> jlhTransaksiMasuk($tahunAwalKomplit, $tahunAkhirKomplit);
            $qReleaseTahun = $this -> state($this -> sn) ->  getTransaksiMasuk($tahunAwalKomplit, $tahunAkhirKomplit);
            $totalTransaksi = 0;
            foreach($qReleaseTahun as $qt){
                $nilaiTransaksi = $qt['jumlah'];
                $totalTransaksi = $totalTransaksi + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksi'] = $totalTransaksi;
            //data transaksi keluar 
            
            $arrTemp['jlhTransaksiKeluar'] = $this -> state($this -> sn) -> jlhTransaksiKeluar($tahunAwalKomplit, $tahunAkhirKomplit);
            $qReleaseTahunKeluar = $this -> state($this -> sn) -> getTransaksiKeluar($tahunAwalKomplit, $tahunAkhirKomplit);
            $totalTransaksiKeluar = 0;
            foreach($qReleaseTahunKeluar as $qtk){
                $nilaiTransaksi = $qtk['jumlah'];
                $totalTransaksiKeluar = $totalTransaksiKeluar + $totalTransaksi;
            }
            $arrTemp['nilaiTransaksiKeluar'] = $totalTransaksiKeluar;

            $dbdata[] = $arrTemp;
        }
       
        $this -> toJson($dbdata);
    }
    //buat laporan dari bulan
    public function getBulanReport()
    {
        $dbdata         = array();
        $tahun          = $this -> inp('tahun');
        $bulan          = $this -> inp('bulan');
        $blnInt         = $this -> bulanToInt(strtolower($bulan));
        $jlhDay         = $this -> ambilHari($blnInt);
        for($x = 1; $x <= $jlhDay; $x++){
            $arrTemp['tanggal']         = $x;
            $tglAwalKomplit             = $tahun."-".$blnInt."-".$x." 00:00:00";
            $tglAkhirKomplit            = $tahun."-".$blnInt."-".$x." 23:59:59";
            //rekap transaksi masuk
            $arrTemp['totalTransaksi']  = $this -> state($this -> sn) -> blnJlhTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksi                 = $this -> state($this -> sn) -> blnGetTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit);
            $nilaiTransaksi             = 0;
            foreach($qTransaksi as $qt){
                $tempTransaksi  = $qt['jumlah'];
                $nilaiTransaksi = $nilaiTransaksi + $tempTransaksi;
            }
            $arrTemp['nilaiTransaksi']          = $nilaiTransaksi;
            //rekap transaksi keluar 
            $arrTemp['totalTransaksiKeluar']    = $this -> state($this -> sn) -> blnJlhTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksiKeluar                   = $this -> state($this -> sn) -> blnGetTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $nilaiTransaksiKeluar               = 0;
            foreach($qTransaksiKeluar as $qtk){
                $tempTransaksi          = $qtk['jumlah'];
                $nilaiTransaksiKeluar   = $nilaiTransaksiKeluar + $tempTransaksi;
            }
            $arrTemp['nilaiTransaksiKeluar']    = $nilaiTransaksiKeluar;
            $dbdata[]                           = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
    //buat laporan tanggal 
    public function getTanggalReport()
    {
        $dbdata             = array();
        $tahun              = $this -> inp('tahun');
        $bulan              = $this -> inp('bulan');
        $tanggal            = $this -> inp('tanggal');
        //konversi bulan indo ke int
        $blnSmallCaps = strtolower($bulan);
        $blnInt             = $this -> bulanToInt($blnSmallCaps);
        //konversi tanggal beda digit
        $tanggalBenar       = $this -> getTanggalBedaDigit($tanggal);
        $tanggalFix         = $tahun."-".$blnInt."-".$tanggalBenar;
        $tglAwalKomplit     = $tanggalFix." 00:00:00";
        $tglAkhirKomplit    = $tanggalFix." 23:59:59";
        //rekap transaksi
        $data['jumlah']     = $this -> state($this -> sn) -> jlhRekapTransaksi($tglAwalKomplit, $tglAkhirKomplit);
        $qTransaksi         = $this -> state($this -> sn) -> getRekapTransaksi($tglAwalKomplit, $tglAkhirKomplit);
        foreach($qTransaksi as $qt){
            $arrTemp['waktu']           = $qt['waktu'];
            $arrTemp['arus']            = $qt['arus'];
            $arrTemp['jumlah']          = $qt['jumlah'];
            $arrTemp['kdTransaksi']     = $qt['kd_tracking'];
            $dbdata[]                   = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
    //buat laporan tahun
    public function getTahunReport()
    {
        $dbdata     = array();
        $tahun      = $this -> inp('tahun');
        $arrBulan   = $this ->  getListBulanInt();
        $jlhBulan   = 12;
        
        for($x = 0; $x < $jlhBulan; $x++){
            $arrTemp['bulan']           = $this -> bulanIndo($arrBulan[$x]);
            $bulanNow                   = $arrBulan[$x];
            $jlhDay                     = $this -> ambilHari($bulanNow);
            // $arrTemp['jlhTransaksi'] = $jlhDay;
            $tglAkhir                   = $jlhDay;
            $tglAwalKomplit             = $tahun."-".$bulanNow."-01 00:00:00";
            $tglAkhirKomplit            = $tahun."-".$bulanNow."-".$tglAkhir." 23:59:59";
            //rekap transaksi masuk
            $arrTemp['jlhTransaksi']    = $this -> state($this -> sn) -> thnJlhTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksi                 = $this -> state($this -> sn) -> thnGetTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit);
            $totalNilaiTransaksi        = 0;
            foreach($qTransaksi as $qt){
                $nilaiTransaksi         = $qt['jumlah'];
                $totalNilaiTransaksi    = $totalNilaiTransaksi + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksi']      = $totalNilaiTransaksi;
            //rekap transaksi keluar 
           
            $arrTemp['jlhTransaksiKeluar']  = $this -> state($this -> sn) -> thnJlhTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksiKeluar               = $this -> state($this -> sn) -> thnGetTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $totalNilaiTransaksiKeluar      = 0;
            foreach($qTransaksiKeluar as $qtk){
                $nilaiTransaksi             = $qt['jumlah'];
                $totalNilaiTransaksiKeluar  = $totalNilaiTransaksiKeluar + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksiKeluar']    = $totalNilaiTransaksiKeluar;
            $dbdata[]                           = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

}   