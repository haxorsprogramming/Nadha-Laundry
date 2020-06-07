<?php

class kartuLaundry extends Route{

    public function index()
    {
      $this -> cekUserLogin('userSes','login');
      $data['kartuLaundry'] = $this -> state('kartuLaundryData') -> kartuLaundryAll();
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
      $this -> state('kartuLaundryData') -> prosesRegistrasiCucian($kode, $pelanggan, $waktuMasuk, $operator);
      $bHuruf = "QWERTYUIOPLKJHGFDSAZXCVBNM";
      $bAngka = "1234567890";
      $acakHuruf_1 = str_shuffle($bHuruf);
      $acakHuruf_2 = str_shuffle($bHuruf);
      $acakAngka = str_shuffle($bAngka);
      $kodeRoom = substr($acakHuruf_1, 0, 2).substr($acakAngka, 0, 6).substr($acakHuruf_2, 0, 4);
      $this -> state('kartuLaundryData') -> insertLaundryRoom($kodeRoom, $kode, $operator);
      //update timeline 
      $kdTimeline = $this -> rnstr(15);
      $this -> state('kartuLaundryData') -> insertTimeLine($kdTimeline, $kode, $waktuMasuk, $operator);
      $data['status'] = 'sukses';
      $this -> toJson($data);
    }

    public function detailKartuLaundry($kdService)
    {
      $data['detailKartu'] = $this -> state('kartuLaundryData') -> getKartuLaundry($kdService);
      $data['dataTimeline'] = $this -> state('kartuLaundryData') -> getTimeline($kdService);
      $this -> bind('dasbor/kartuLaundry/detailKartuLaundry', $data);
    }

    public function pickUpCucian()
    {
      $kdService = $this -> inp('kdService');
      $waktuPickUp = $this -> waktu();
      $operator = $this -> getses('userSes');
      $this -> state('kartuLaundryData') -> updateKartuLaundry($waktuPickUp, $kdService);
      //update timeline 
      $kdTimeline = $this -> rnstr(15);
      $this -> state('kartuLaundryData') -> updateTimelinePickup($kdTimeline, $kdService, $waktuPickUp, $operator);
      $data['status'] = 'sukses';
      $this -> toJson($data);
    }

    public function batalkanCucian()
    {
      $kdService = $this -> inp('kdService');
      //hapus di kartu laundry
      $qDeleteKartuLaundry = "DELETE FROM tbl_kartu_laundry WHERE kode_service='$kdService';";
      $this -> st -> query($qDeleteKartuLaundry);
      $this -> st -> queryRun();
      //hapus di laundry room 
      $qDeleteLaundryRoom = "DELETE FROM tbl_laundry_room WHERE kd_kartu='$kdService';";
      $this -> st -> query($qDeleteLaundryRoom);
      $this -> st -> queryRun();
      //hapus di temp item cucian 
      $qDeleteTempCucian = "DELETE FROM tbl_temp_item_cucian WHERE kd_room='$kdService';";
      $this -> st -> query($qDeleteTempCucian);
      $this -> st -> queryRun();
      //hapus di timeline 
      $qDeleteTimeline = "DELETE FROM tbl_timeline WHERE kd_service=$kdService'';";
      $this -> st -> query($qDeleteTimeline);
      $this -> st -> queryRun();
      $data['status'] = 'sukses';
      $this -> toJson($data);
    }

}
