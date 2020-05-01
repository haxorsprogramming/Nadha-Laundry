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
        $data['jumlahHari'] = $this -> ambilHari($bulan);
        $this -> bind('dasbor/laporanTransaksi/laporanTransaksi', $data);
    }

    public function getDefaultReport()
    {
        $dbdata = array();
        $bulan = date('m');
        $jlhDay = $this -> ambilHari($bulan);
        for ($x = 1; $x <= $jlhDay ; $x++) {
            $arrTemp['tanggal'] = $x;
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

}  