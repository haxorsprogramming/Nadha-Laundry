<?php

class Dasbor extends Route{

    public function __construct()
    {
    $this -> st = new state;
    
    }

    public function index()
    {     
        $this -> cekUserLogin('userSes');
        $this -> bind('/dasbor/index');
    }

    public function beranda()
    {
        $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY poin_real DESC LIMIT 0, 5;");
        $data['qRankPelanggan'] = $this -> st -> queryAll();
        //cari jumlah transaksi harian 
        $waktu = $this -> waktu();
        $data['waktu'] = $waktu;
        $this -> bind('/dasbor/beranda', $data);   
    }

    public function logOut()
    {
        $this -> destses();
        $this -> goto(HOMEBASE.'login');
    }

}