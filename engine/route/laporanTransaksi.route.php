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
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit');");
            $arrTemp['jlhRecord'] = $this -> st -> numRow();
            $qTransaksi = $this -> st -> queryAll();
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

}   