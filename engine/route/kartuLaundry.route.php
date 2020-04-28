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
      $waktuMasuk = $this -> waktu();
      $pelanggan = $this -> inp('pelanggan');
      $operator = $this -> getses('userSes');
      $query = "INSERT INTO tbl_kartu_laundry VALUES (null, :kode_service, :pelanggan, :waktu_mulai, '0000-00-00 00:00:00','0000-00-00 00:00:00','pending','$operator', 'hold');";
      $this -> st -> query($query);
      $this -> st -> querySet('kode_service', $kode);
      $this -> st -> querySet('pelanggan', $pelanggan);
      $this -> st -> querySet('waktu_mulai', $waktuMasuk);
      $this -> st -> queryRun();
      
      $bHuruf = "QWERTYUIOPLKJHGFDSAZXCVBNM";
      $bAngka = "1234567890";
      $acakHuruf_1 = str_shuffle($bHuruf);
      $acakHuruf_2 = str_shuffle($bHuruf);
      $acakAngka = str_shuffle($bAngka);
      $kodeRoom = substr($acakHuruf_1, 0, 2).substr($acakAngka, 0, 6).substr($acakHuruf_2, 0, 4);
      $queryToRoom = "INSERT INTO tbl_laundry_room VALUES(null, '$kodeRoom', '$kode', '0', '$operator', 'ready');";
      $this -> st -> query($queryToRoom);
      $this -> st -> queryRun();
      //update timeline 
      $kdTimeline = $this -> rnstr(15);
      $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline','$kode','$waktuMasuk','$operator','registrasi_cucian','Cucian di registrasi');";
      $this -> st -> query($qUpdateTimeline);
      $this -> st -> queryRun();
      $data['status'] = 'sukses';
      $this -> toJson($data);
    }

    public function detailKartuLaundry($kdService)
    {
      $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
      $data['detailKartu'] = $this -> st -> querySingle();
      $this -> st -> query("SELECT * FROM tbl_timeline WHERE kd_service='$kdService';");
      $data['dataTimeline'] = $this -> st -> queryAll();
      $this -> bind('dasbor/kartuLaundry/detailKartuLaundry', $data);
    }

    public function pickUpCucian()
    {
      $kdService = $this -> inp('kdService');
      $waktuPickUp = $this -> waktu();
      $operator = $this -> getses('userSes');
      $qUpdatePickUp = "UPDATE tbl_kartu_laundry SET waktu_diambil='$waktuPickUp' WHERE kode_service='$kdService';";
      $this -> st -> query($qUpdatePickUp);
      $this -> st -> queryRun();
      //update timeline 
      $kdTimeline = $this -> rnstr(15);
      $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline','$kdService','$waktuPickUp','$operator','pick_up','Cucian telah diambil');";
      $this -> st -> query($qUpdateTimeline);
      $this -> st -> queryRun();
      $data['status'] = 'sukses';
      $this -> toJson($data);
    }

    public function tesRandom()
    {
      $kode = $this -> rnstr(20);
      echo $kode;
    }

}
