<?php

class dataTransaksi extends Route{

    public function __construct()
    {
    $this -> st = new state;
    
    }

    public function index()
    {     
       $this -> st -> query("SELECT * FROM tbl_pembayaran;");
       $data['dataTransaksi'] = $this -> st -> queryAll();
       $this -> bind('dasbor/dataTransaksi/dataTransaksi', $data);
    }

    public function detailTransaksi()
    {
        $kdTransaksi = $this -> inp('kdTransaksi');
        $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE kd_pembayaran='$kdTransaksi' LIMIT 0,1;");
        $data['dataTransaksi'] = $this -> st -> querySingle();
        $this -> bind('dasbor/dataTransaksi/detailTransaksi', $data);
    }

    public function cetak($kdTransaksi)
    {   
        $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE kd_pembayaran='$kdTransaksi' LIMIT 0,1;");
        $data['qPembayaran'] = $this -> st -> querySingle();
        $this -> bind('dasbor/dataTransaksi/cetak', $data);
    }

    public function getDataTransaksi()
    {
        $dbdata = array();
        $this -> st -> query("SELECT * FROM tbl_pembayaran;");
        $data['dataTransaksi'] = $this -> st -> queryAll();
        foreach($data['dataTransaksi'] as $dis){
            $arrTemp['invoice'] = $dis['kd_pembayaran'];
            $kodeService = $dis['kd_kartu'];
            $arrTemp['waktu'] = $dis['waktu'];
            $arrTemp['total'] = $dis['total_final'];
            $arrTemp['kodeService'] = $kodeService;
            //cari username dari tabel kartu laundry 
            $this -> st -> query("SELECT pelanggan FROM tbl_kartu_laundry WHERE kode_service='$kodeService';");
            $qUsername = $this -> st -> querySingle();
            $username = $qUsername['pelanggan'];
            //cari nama pelanggan dari tabel pelanggan 
            $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$username';");
            $qNamaLengkap = $this -> st -> querySingle();
            $arrTemp['namaPelanggan'] = $qNamaLengkap['nama_lengkap'];
            $dbdata[] = $arrTemp;
        }

        $this -> toJson($dbdata);
    }

}
