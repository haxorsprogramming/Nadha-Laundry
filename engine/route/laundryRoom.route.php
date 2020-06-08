<?php

class laundryRoom extends Route{

   public function index()
    {
        $this -> cekUserLogin('userSes','login');
        $data['laundryRoom'] = $this -> state('laundryRoomData') -> laundryRoomData();
        $this -> bind('dasbor/laundryRoom/laundryRoom', $data);
    }

   public function detailCucian()
    {
        $this -> cekUserLogin('userSes','login');
        $data['listProduk'] = $this -> state('laundryRoomData') -> listProduk();
        $data['kd'] = $this -> inp('kd');
        $this -> bind('dasbor/laundryRoom/detailCucian', $data);
    }

   public function getInfoProduk()
    {
        $kdProduk = $this -> inp('kdProduk');
        $dProduk = $this -> state('laundryRoomData') -> getInfoProduk($kdProduk);
        $this -> toJson($dProduk);
    }

   public function prosesTambahItem()
   {
       $kdRegistrasi = $this -> inp('kdReg');
       $kdService = $this -> inp('serviceKd');
       $hargaAt = $this -> inp('hargaAt');
       $qt = $this -> inp('qt');
       $kdTemp = $this -> rnstr(10);
       $waktu = $this -> waktu();
       $total = $hargaAt * $qt;
       $operator = $this -> getses('userSes');
       $this -> state('laundryRoomData') -> insertTempCucian($kdTemp, $kdRegistrasi, $kdService, $hargaAt, $qt, $total);
       $this -> state('laundryRoomData') -> updateLaundryRoom($kdRegistrasi);
       $this -> state('laundryRoomData') -> updateKartuLaundry($kdRegistrasi);
       //proses update timeline
       $jlhTimeLine = $this -> state('laundryRoomData') -> jumlahTimeline($kdRegistrasi);

       if($jlhTimeLine < 1){
        $kdTimeline = $this -> rnstr(15);
        $this -> state('laundryRoomData') -> insertTimeline($kdTimeline, $kdRegistrasi, $waktu, $operator);
       }else{
           // do something .. ^_^
       }
       
       $data['status'] = 'sukses';
       $this -> toJson($data);
   }

   public function getItemService()
   {
       $dbdata = array();
       $kdRegistrasi = $this -> inp('kdRegistrasi');
       $dIts = $this -> state('laundryRoomData') -> getTempCucian($kdRegistrasi);

       foreach($dIts as $dis){
        $kdItem = $dis['kd_item'];
        $dNamaProd = $this -> state('laundryRoomData') -> getServiceData($kdItem);
        $arrTemp['kd_item'] = $dis['kd_item']; 
        $arrTemp['qt'] = $dis['qt'];
        $arrTemp['namaCap'] = $dNamaProd['nama'];
        $arrTemp['total'] = $dis['total'];
        $dbdata[] = $arrTemp;
       }
        
       $this -> toJson($dbdata);
   }

   public function setCucianSelesai()
   {
       $kdService = $this -> inp('kdService');
       $waktuSelesai = $this -> waktu();
       $operator = $this -> getses('userSes');
       //update status cucian menjadi selesai 
       $this -> state('laundryRoomData') -> updateKartuNRoomLaundry($kdService, $waktuSelesai);
       //cari keseluruhan harga 
       $fHargaTotal = $this -> state('laundryRoomData') ->  totalTempHarga($kdService);
       $hargaAwal = 0;
       foreach($fHargaTotal as $qHar){
        $hargaTemp = $qHar['total'];
        $hargaAwal = $hargaAwal + $hargaTemp;
       }
       //update ke cucian 
       $this -> state('laundryRoomData') ->  updateHargaCucian($hargaAwal, $kdService);
       //update timeline 
       $kdTimeline = $this -> rnstr(15);
       $this -> state('laundryRoomData') -> updateTimeline($kdTimeline, $kdService, $waktuSelesai, $operator);
       // kirim email ke pelanggan 
       $judul = "Status Cucian";
       // cari email host
       $qEmail = $this -> state('laundryRoomData') -> emailHost();
       $email = $qEmail['value'];
       //password email host 
       $qPassword = $this -> state('laundryRoomData') -> passwordHost();
       $password = $qPassword['value'];
       $emailHost = $email;
       $passwordHost = $password;
       //cari email pelanggan 
       $qUsernamePelanggan = $this -> state('laundryRoomData') -> getUsernamePelanggan($kdService);
       $username = $qUsernamePelanggan['pelanggan'];
       $qPelanggan = $this -> state('laundryRoomData') -> getDataPelanggan($username);
       $emailPelanggan = $qPelanggan['email'];
       $namaPelanggan = $qPelanggan['nama_lengkapp'];
       $isi = "Halo ".$namaPelanggan.", cucian kamu dengan Kode ".$kdService." sudah selesai dicuci, silahkan ambil di laundry kita ya";
       //public function kirimEmail($nama,$penerima,$judul,$isi,$emailHost,$passwordHost)
       $this -> kirimEmail($namaPelanggan,$emailPelanggan,$judul,$isi,$emailHost,$passwordHost);
       $this -> toJson($kdService);
   }

}
