<?php

class kartuLaundry extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

    public function index()
    {
      $this -> cekUserLogin('userSes');
      $this -> st -> query("SELECT * FROM tbl_kartu_laundry ORDER BY id DESC;");
      $data['kartuLaundry'] = $this -> st -> queryAll();
      $this -> bind('dasbor/kartuLaundry/kartuLaundry', $data);
    }

    public function formRegistrasiCucian()
    {
       $bHuruf = "QWERTYUIOPLKJHGFDSAZXCVBNM";
       $bAngka = "1234567890";
       $acakHuruf_1 = str_shuffle($bHuruf);
       $acakHuruf_2 = str_shuffle($bHuruf);
       $acakAngka = str_shuffle($bAngka);
       $data['kodeRegistrasi'] = substr($acakHuruf_1, 0, 2).substr($acakAngka, 0, 6).substr($acakHuruf_2, 0, 4);
       $data['waktuMasuk'] = date("Y-m-d H:i");
      $this -> bind('dasbor/kartuLaundry/formRegistrasiCucian', $data);
    }

    public function prosesRegistrasiCucian()
    {
      $kode = $this -> inp('kodeRegistrasi');
      $waktuMasuk = date("Y-m-d H:i:s");
      $pelanggan = $this -> inp('pelanggan');
      $tokenAwal = "";
      
      $data['status'] = $kode;
      $this -> toJson($data);
    }

}
