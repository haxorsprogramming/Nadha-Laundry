<?php

class dasbor extends Route{

    private $sn = 'dashboard';

    public function index()
    {     
        $this -> cekUserLogin('userSes','login');
        $user                   =  $this -> getses('userSes');
        $data['usernameLogin']  = $user;
        //cari level user
        $qUser                  = $this -> state($this -> sn) -> levelUserLogin($user);
        $data['levelUser']      = $qUser['tipe_user'];
        $this -> bind('/dasbor/index', $data);
    }

    public function beranda()
    {
        $data['rankPelanggan']          = $this -> state($this -> sn) -> rankPelanggan();
        //cari jumlah transaksi harian 
        $waktu                          = $this -> waktu();
        $pecahTglWaktu                  = explode(" ", $waktu);
        $bahanTanggal                   = explode("-", $pecahTglWaktu[0]);
        $tanggalKedepan                 = $bahanTanggal[2] + 1;
        $tglNext                        = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$tanggalKedepan;
        $waktuStart                     = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$bahanTanggal[2]." 00:00:01";
        $waktuAkhir                     = $bahanTanggal[0]."-".$bahanTanggal[1]."-".$tanggalKedepan." 00:00:00";
        $data['jlhTransaksiHarian']     = $this -> state($this -> sn) -> jlhTransaksiHarian($waktuStart, $waktuAkhir);
        $data['waktu_akhir']            = $tanggalKedepan;
        $this -> bind('/dasbor/beranda', $data);   
    }

    public function logOut()
    {
        $this -> destses();
        $this -> goto(HOMEBASE.'login');
    }

}