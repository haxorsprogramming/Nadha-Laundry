<?php

class laporanTransaksi extends Route{

    public function __construct()
    {
            $this -> st = new state;
    }

    public function index()
    {
        $bulan = date('m');
        $data['bulanIni'] = $bulan;
        $data['bulanIndo'] = $this -> bulanIndo($bulan);
        $data['jumlahHari'] = $this -> ambilHari($bulan);
        $this -> bind('dasbor/laporanTransaksi/laporanTransaksi', $data);
    }
    
    public function getRelaseTahun()
    {
        //ambil tahun relase awal
        $dbdata = array(); 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='tahun_release';");
        $qTahunRelase = $this -> st -> querySingle();
        $tahunRelase = $qTahunRelase['value'];
        $frekuensiTahun = 10;
        for($i = 0; $i <= 10; $i++){
            $tahunAwal = $tahunRelase + $i;
            $tahunAkhir = $tahunAwal + 1;
            $arrTemp['tahun'] = $tahunAwal;
            //cari total transaksi berdasarkan tahun 
            $tahunAwalKomplit = $tahunAwal."-01-01 00:00:00";
            $tahunAkhirKomplit = $tahunAwal."-12-31 23:59:59";
            //data transaksi masuk
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwalKomplit' AND '$tahunAkhirKomplit') AND arus='masuk';");
            $arrTemp['jlhTransaksi'] = $this -> st -> numRow();
            $qReleaseTahun = $this -> st -> queryAll();
            $totalTransaksi = 0;
            foreach($qReleaseTahun as $qt){
                $nilaiTransaksi = $qt['jumlah'];
                $totalTransaksi = $totalTransaksi + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksi'] = $totalTransaksi;
            //data transaksi keluar 
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwalKomplit' AND '$tahunAkhirKomplit') AND arus='keluar';");
            $arrTemp['jlhTransaksiKeluar'] = $this -> st -> numRow();
            $qReleaseTahunKeluar = $this -> st -> queryAll();
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

    public function getDefaultReport()
    {
        $dbdata = array();
        $bulan = date('m');
        $tahun = date('Y');
        $bulanIndo = $this -> bulanIndo($bulan);
        $jlhDay = $this -> ambilHari($bulan);
        for ($x = 1; $x <= $jlhDay ; $x++) {
            $arrTemp['tanggal'] = $x;
            $arrTemp['bulanIndo'] = $bulanIndo; 
            $tglAwalKomplit = $tahun."-".$bulan."-".$x." 00:00:00";
            $tglAkhirKomplit = $tahun."-".$bulan."-".$x." 23:59:59";
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
            $arrTemp['jlhRecord'] = $this -> st -> numRow();
            $qTransaksi = $this -> st -> queryAll();
            $totalTempTransaksi = 0;
            foreach($qTransaksi as $qT){
                $nilaiTransaksi = $qT['jumlah'];
                $totalTempTransaksi = $totalTempTransaksi + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksi'] = $totalTempTransaksi;
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
    //buat laporan dari bulan
    public function getBulanReport()
    {
        $dbdata = array();
        $bulanPost = $this -> inp('bulan');
        $bulan = $this -> bulanToInt($bulanPost);
        $tahun = date('Y');
        $bulanIndo = $this -> bulanIndo($bulan);
        $jlhDay = $this -> ambilHari($bulan);
        for ($x = 1; $x <= $jlhDay ; $x++) {
            $arrTemp['tanggal'] = $x;
            $arrTemp['bulanIndo'] = $bulanIndo; 
            $tglAwalKomplit = $tahun."-".$bulan."-".$x." 00:00:00";
            $tglAkhirKomplit = $tahun."-".$bulan."-".$x." 23:59:59";
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
            $arrTemp['jlhRecord'] = $this -> st -> numRow();
            $qTransaksi = $this -> st -> queryAll();
            $totalTempTransaksi = 0;
            foreach($qTransaksi as $qT){
                $nilaiTransaksi = $qT['jumlah'];
                $totalTempTransaksi = $totalTempTransaksi + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksi'] = $totalTempTransaksi;
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
    //buat laporan tahun
    public function getTahunReport()
    {
        $dbdata = array();
        $tahun = $this -> inp('tahun');
        $arrBulan = $this ->  getListBulanInt();
        $jlhBulan = 12;
        
        for($x = 0; $x < $jlhBulan; $x++){
            $arrTemp['bulan'] = $this -> bulanIndo($arrBulan[$x]);
            $bulanNow = $arrBulan[$x];
           
            $jlhDay = $this -> ambilHari($bulanNow);
            // $arrTemp['jlhTransaksi'] = $jlhDay;
            $tglAkhir = $jlhDay;
            $tglAwalKomplit = $tahun."-".$bulanNow."-01 00:00:00";
            $tglAkhirKomplit = $tahun."-".$bulanNow."-".$tglAkhir." 23:59:59";
            //rekap transaksi masuk
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
            $arrTemp['jlhTransaksi'] = $this -> st -> numRow();
            $qTransaksi = $this -> st -> queryAll();
            $totalNilaiTransaksi = 0;
            foreach($qTransaksi as $qt){
                $nilaiTransaksi = $qt['jumlah'];
                $totalNilaiTransaksi = $totalNilaiTransaksi + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksi'] = $totalNilaiTransaksi;
            //rekap transaksi keluar 
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
            $arrTemp['jlhTransaksiKeluar'] = $this -> st -> numRow();
            $qTransaksiKeluar = $this -> st -> queryAll();
            $totalNilaiTransaksiKeluar = 0;
            foreach($qTransaksiKeluar as $qtk){
                $nilaiTransaksi = $qt['jumlah'];
                $totalNilaiTransaksiKeluar = $totalNilaiTransaksiKeluar + $nilaiTransaksi;
            }
            $arrTemp['nilaiTransaksiKeluar'] = $totalNilaiTransaksiKeluar;

            $dbdata[] = $arrTemp;
        }

        // $data['status'] = $arrBulan[2];

        $this -> toJson($dbdata);
    }

}   