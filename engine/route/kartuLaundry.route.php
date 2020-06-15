<?php

class kartuLaundry extends Route{

    private $sn = 'kartuLaundryData';

    public function index()
    {
      $this -> cekUserLogin('userSes','login');
      $data['kartuLaundry'] = $this -> state($this -> sn) -> kartuLaundryAll();
      $this -> bind('dasbor/kartuLaundry/kartuLaundry', $data);
    } 
 
    public function formRegistrasiCucian()
    {
       $bHuruf                  = "QWERTYUIOPLKJHGFDSAZXCVBNM";
       $bAngka                  = "1234567890";
       $acakHuruf_1             = str_shuffle($bHuruf);
       $acakHuruf_2             = str_shuffle($bHuruf);
       $acakAngka               = str_shuffle($bAngka);
       $data['kodeRegistrasi']  = substr($acakHuruf_1, 0, 2).substr($acakAngka, 0, 6).substr($acakHuruf_2, 0, 4);
       $data['waktuMasuk']      = date("Y-m-d H:i");
       $this -> bind('dasbor/kartuLaundry/formRegistrasiCucian', $data);
    }

    public function prosesRegistrasiCucian()
    {
      $kode             = $this -> inp('kodeRegistrasi');
      $waktuMasuk       = $this -> waktu();
      $pelanggan        = $this -> inp('pelanggan');
      $operator         = $this -> getses('userSes');
      $this -> state($this -> sn) -> prosesRegistrasiCucian($kode, $pelanggan, $waktuMasuk, $operator);
      $bHuruf           = "QWERTYUIOPLKJHGFDSAZXCVBNM";
      $bAngka           = "1234567890";
      $acakHuruf_1      = str_shuffle($bHuruf);
      $acakHuruf_2      = str_shuffle($bHuruf);
      $acakAngka        = str_shuffle($bAngka);
      $kodeRoom         = substr($acakHuruf_1, 0, 2).substr($acakAngka, 0, 6).substr($acakHuruf_2, 0, 4);
      $this -> state($this -> sn) -> insertLaundryRoom($kodeRoom, $kode, $operator);
      //update timeline 
      $kdTimeline       = $this -> rnstr(15);
      $this -> state($this -> sn) -> insertTimeLine($kdTimeline, $kode, $waktuMasuk, $operator);
      $data['status']   = 'sukses';
      $this -> toJson($data);
    }

    public function detailKartuLaundry($kdService)
    {
      $data['detailKartu']  = $this -> state($this -> sn) -> getKartuLaundry($kdService);
      $data['dataTimeline'] = $this -> state($this -> sn) -> getTimeline($kdService);
      $this -> bind('dasbor/kartuLaundry/detailKartuLaundry', $data);
    }

    public function pickUpCucian()
    {
      $kdService        = $this -> inp('kdService');
      $waktuPickUp      = $this -> waktu();
      $operator         = $this -> getses('userSes');
      $this -> state($this -> sn) -> updateKartuLaundry($waktuPickUp, $kdService);
      //update timeline 
      $kdTimeline       = $this -> rnstr(15);
      $this -> state($this -> sn) -> updateTimelinePickup($kdTimeline, $kdService, $waktuPickUp, $operator);
      $data['status']   = 'sukses';
      $this -> toJson($data);
    }

    public function batalkanCucian()
    {
      $kdService      = $this -> inp('kdService');
      $this -> state($this -> sn) -> batalkanCucian($kdService);
      $data['status'] = 'sukses';
      $this -> toJson($data);
    }

}
