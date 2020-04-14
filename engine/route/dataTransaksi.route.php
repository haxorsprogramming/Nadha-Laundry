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

}
