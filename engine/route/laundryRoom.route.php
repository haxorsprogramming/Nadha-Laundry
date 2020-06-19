<?php

class laundryRoom extends Route{

    private $sn = 'laundryRoomData';

   public function index()
    {
        $this -> cekUserLogin('userSes','login');
        $data['laundryRoom'] = $this -> state($this -> sn) -> laundryRoomData();
        $this -> bind('dasbor/laundryRoom/laundryRoom', $data);
    }

   public function detailCucian($kd)
    {
        $this -> cekUserLogin('userSes','login');
        $data['listProduk']     = $this -> state($this -> sn) -> listProduk();
        $data['kd']             = $kd;
        $this -> bind('dasbor/laundryRoom/detailCucian', $data);
    }

   public function getInfoProduk()
    {
        $kdProduk   = $this -> inp('kdProduk');
        $dProduk    = $this -> state($this -> sn) -> getInfoProduk($kdProduk);
        $this -> toJson($dProduk);
    }
 
   public function prosesTambahItem()
   {
       $kdRegistrasi    = $this -> inp('kdReg');
       $kdService       = $this -> inp('serviceKd');
       $hargaAt         = $this -> inp('hargaAt');
       $qt              = $this -> inp('qt');
       $kdTemp          = $this -> rnstr(10);
       $waktu           = $this -> waktu();
       $total           = $hargaAt * $qt;
       $operator        = $this -> getses('userSes');
       $this -> state($this -> sn) -> insertTempCucian($kdTemp, $kdRegistrasi, $kdService, $hargaAt, $qt, $total);
       $this -> state($this -> sn) -> updateLaundryRoom($kdRegistrasi);
       $this -> state($this -> sn) -> updateKartuLaundry($kdRegistrasi);
       //proses update timeline
       $jlhTimeLine     = $this -> state($this -> sn) -> jumlahTimeline($kdRegistrasi);

       if($jlhTimeLine < 1){
        $kdTimeline = $this -> rnstr(15);
        $this -> state($this -> sn) -> insertTimeline($kdTimeline, $kdRegistrasi, $waktu, $operator);
       }else{
           // do something .. ^_^
       }
       $data['status'] = 'sukses';
       $this -> toJson($data);
   }

   public function getItemService()
   {
       $dbdata          = array();
       $kdRegistrasi    = $this -> inp('kdRegistrasi');
       $dIts            = $this -> state($this -> sn) -> getTempCucian($kdRegistrasi);

       foreach($dIts as $dis){
        $kdItem                 = $dis['kd_item'];
        $dNamaProd              = $this -> state($this -> sn) -> getServiceData($kdItem);
        $arrTemp['kd_item']     = $dis['kd_item']; 
        $arrTemp['qt']          = $dis['qt'];
        $arrTemp['namaCap']     = $dNamaProd['nama'];
        $arrTemp['total']       = $dis['total'];
        $dbdata[]               = $arrTemp;
       }
        
       $this -> toJson($dbdata);
   }
 
   public function setCucianSelesai()
   {
       $kdService       = $this -> inp('kdService');
       $waktuSelesai    = $this -> waktu();
       $operator        = $this -> getses('userSes');
       //update status cucian menjadi selesai 
       $this -> state($this -> sn) -> updateKartuNRoomLaundry($kdService, $waktuSelesai);
       //cari keseluruhan harga 
       $fHargaTotal     = $this -> state($this -> sn) ->  totalTempHarga($kdService);
       $hargaAwal = 0;
       foreach($fHargaTotal as $qHar){
        $hargaTemp = $qHar['total'];
        $hargaAwal = $hargaAwal + $hargaTemp;
       }
       //update ke cucian 
       $this -> state($this -> sn) ->  updateHargaCucian($hargaAwal, $kdService);
       //update timeline 
       $kdTimeline          = $this -> rnstr(15);
       $this -> state($this -> sn) -> updateTimeline($kdTimeline, $kdService, $waktuSelesai, $operator);
       // kirim email ke pelanggan 
       $judul               = "Status Cucian";
       // cari email host
       $qEmail              = $this -> state($this -> sn) -> emailHost();
       $email               = $qEmail['value'];
       //password email host 
       $qPassword           = $this -> state($this -> sn) -> passwordHost();
       $password            = $qPassword['value'];
       $emailHost           = $email;
       $passwordHost        = $password;
       //cari email pelanggan 
       $qUsernamePelanggan  = $this -> state($this -> sn) -> getUsernamePelanggan($kdService);
       $username            = $qUsernamePelanggan['pelanggan'];
       $qPelanggan          = $this -> state($this -> sn) -> getDataPelanggan($username);
       $emailPelanggan      = $qPelanggan['email'];
       $namaPelanggan       = $qPelanggan['nama_lengkap'];
       $phone_no            = $qPelanggan['hp'];
       $isi                 = "Halo ".$namaPelanggan.", cucian kamu dengan Kode ".$kdService." sudah selesai dicuci, silahkan ambil di laundry kita ya";
       //public function kirimEmail($nama,$penerima,$judul,$isi,$emailHost,$passwordHost)
       $this -> kirimEmail($namaPelanggan,$emailPelanggan,$judul,$isi,$emailHost,$passwordHost);
       //kirim ke wa 
       $qApiKey             = $this -> state($this -> sn) -> getApiKey();
       $apiKey              = $qApiKey['value'];
       $hargaWa             = number_format($hargaAwal);
       //cari nama laundry 
       $namaLaundry         = $this -> state('utilityData') -> getLaundryData('laundry_name');
       $message             = "Status Cucian - ".$namaLaundry.". Halo ".$namaPelanggan.", cucian anda dengan kode ".$kdService." telah selesai. Dengan total tagihan Rp. ".$hargaWa.", silahkan ambil cucian di laundry kita ya. Terima kasih..";
       $this -> cucianSelesaiNotif($message, $phone_no, $apiKey);
       $this -> toJson($kdService);
   }

}
