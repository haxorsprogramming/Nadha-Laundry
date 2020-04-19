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
        $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY poin_real DESC LIMIT 0, 6;");
        $data['qRankPelanggan'] = $this -> st -> queryAll();
        //cari jumlah transaksi harian 
        $waktu = $this -> waktu();
        $pecahTglWaktu = explode(" ", $waktu);
        $bahanTanggal = explode("-", $pecahTglWaktu[0]);
        $tanggalKedepan = $bahanTanggal[2] + 1;
        $tglNext = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$tanggalKedepan;
        $waktuStart = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$bahanTanggal[2]." 00:00:01";
        $waktuAkhir = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$tanggalKedepan." 00:00:00";
        $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE (waktu BETWEEN '$waktuStart' AND '$waktuAkhir');");
        $data['jlhTransaksiHarian'] =  $this -> st -> numRow();
        $data['waktu_akhir'] = $tanggalKedepan;
        $this -> bind('/dasbor/beranda', $data);   
    }

    public function logOut()
    {
        $this -> destses();
        $this -> goto(HOMEBASE.'login');
    }

}