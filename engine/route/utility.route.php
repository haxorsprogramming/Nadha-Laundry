<?php

class utility extends Route{

    public function getInfoLaundry()
    {   
        // nama laundry
        $data['namaLaundry'] = $this -> state('utilityData') -> getLaundryData('laundry_name');
        // alamat
        $data['alamatLaundry'] = $this -> state('utilityData') -> getLaundryData('address');
        //kota 
        $data['kotaLaundry'] = $this -> state('utilityData') -> getLaundryData('kota');
        //kota 
        $data['kabupatenLaundry'] = $this -> state('utilityData') -> getLaundryData('kabupaten');
        //provinsi 
        $data['provinsiLaundry'] = $this -> state('utilityData') -> getLaundryData('provinsi');
        //kode pos
        $data['kodePosLaundry'] = $this -> state('utilityData') -> getLaundryData('kode_pos');
        $this -> toJson($data);
    }

    public function getWorkers()
    {
        $waktu = $this -> waktu();
         // nama laundry
         $data['namaLaundry'] = $this -> state('utilityData') -> getLaundryData('laundry_name');
         //alamat
         $data['alamatLaundry'] = $this -> state('utilityData') -> getLaundryData('address');
         //kota 
         $data['kotaLaundry'] = $this -> state('utilityData') -> getLaundryData('kota');
         //kabupaten 
         $data['kabupatenLaundry'] = $this -> state('utilityData') -> getLaundryData('kabupaten');
         //provinsi 
         $data['provinsiLaundry'] = $this -> state('utilityData') -> getLaundryData('provinsi');
         //email
         $data['email'] = $this -> state('utilityData') -> getLaundryData('email');
         //hp 
         $hp = $this -> state('utilityData') -> getLaundryData('hp');
         $data['hp'] = $hp;
        $this -> toJson($data);
    }

    public function getInfoPelanggan()
    {
        $kodeService = $this -> inp('kodeService');
        $qKartuLaundry = $this -> state('utilityData') -> getInfoPelanggan($kodeService);
        $pelanggan = $qKartuLaundry['pelanggan'];
        //cari nama pelanggan 
        $qNamaPelanggan = $this -> state('utilityData') -> getDataPelanggan($pelanggan);
        $data['namaPelanggan'] = $qNamaPelanggan['nama_lengkap'];
        $data['emailPelanggan'] = $qNamaPelanggan['email'];
        $data['alamatPelanggan'] = $qNamaPelanggan['alamat'];
        $this -> toJson($data);
    }

    public function getInfoBeranda()
    {
        //cari jumlah pelanggan 
        $jlhPelanggan = $this -> state('utilityData') -> getJumlahPelanggan();
        $data['jlhPelanggan'] = $jlhPelanggan;
        //cari jumlah cucian 
        $jlhCucian = $this -> state('utilityData') -> getJumlahCucian();
        $data['jlhCucian'] = $jlhCucian;
        
        $this -> toJson($data);
    }

    public function getListBulan()
    {
        $dbdata = array();
        $jlhBulan = 12;
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        for ($x = 0; $x < $jlhBulan ; $x++) {
            $arrTemp['bulan'] = $bulan[$x];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

   
}