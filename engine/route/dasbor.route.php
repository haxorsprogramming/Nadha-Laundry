<?php

class dasbor extends Route{

    public function index()
    {     
        $this -> cekUserLogin('userSes');
        $user =  $this -> getses('userSes');
        $data['usernameLogin'] = $user;
        //cari level user
        $qUser = $this -> state('dashboard') -> levelUserLogin($user);
        $data['levelUser'] = $qUser['tipe_user'];
        $this -> bind('/dasbor/index', $data);
    }

    public function beranda()
    {
        
        // $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY poin_real DESC LIMIT 0, 6;");
        // $data['qRankPelanggan'] = $this -> state('dasbor') -> rankPelanggan();
        //cari jumlah transaksi harian 
        // $waktu = $this -> waktu();
        // $pecahTglWaktu = explode(" ", $waktu);
        // $bahanTanggal = explode("-", $pecahTglWaktu[0]);
        // $tanggalKedepan = $bahanTanggal[2] + 1;
        // $tglNext = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$tanggalKedepan;
        // $waktuStart = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$bahanTanggal[2]." 00:00:01";
        // $waktuAkhir = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$tanggalKedepan." 00:00:00";
        // $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE (waktu BETWEEN '$waktuStart' AND '$waktuAkhir');");
        // $data['jlhTransaksiHarian'] =  $this -> st -> numRow();
        // $data['waktu_akhir'] = $tanggalKedepan;
        // $this -> bind('/dasbor/beranda', $data);   
    }

    public function logOut()
    {
        $this -> destses();
        $this -> goto(HOMEBASE.'login');
    }

}