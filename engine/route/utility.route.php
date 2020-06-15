<?php

class utility extends Route{

    private $sn = 'utilityData';

    public function getInfoLaundry()
    {   
        // nama laundry
        $data['namaLaundry']        = $this -> state($this -> sn) -> getLaundryData('laundry_name');
        // alamat
        $data['alamatLaundry']      = $this -> state($this -> sn) -> getLaundryData('address');
        //kota 
        $data['kotaLaundry']        = $this -> state($this -> sn) -> getLaundryData('kota');
        //kota 
        $data['kabupatenLaundry']   = $this -> state($this -> sn) -> getLaundryData('kabupaten');
        //provinsi 
        $data['provinsiLaundry']    = $this -> state($this -> sn) -> getLaundryData('provinsi');
        //kode pos
        $data['kodePosLaundry']     = $this -> state($this -> sn) -> getLaundryData('kode_pos');
        $this -> toJson($data);
    }

    public function getWorkers()
    {
        $waktu = $this -> waktu();
         // nama laundry
         $data['namaLaundry']       = $this -> state($this -> sn) -> getLaundryData('laundry_name');
         //alamat
         $data['alamatLaundry']     = $this -> state($this -> sn) -> getLaundryData('address');
         //kota 
         $data['kotaLaundry']       = $this -> state($this -> sn) -> getLaundryData('kota');
         //kabupaten 
         $data['kabupatenLaundry']  = $this -> state($this -> sn) -> getLaundryData('kabupaten');
         //provinsi 
         $data['provinsiLaundry']   = $this -> state($this -> sn) -> getLaundryData('provinsi');
         //email
         $data['email']             = $this -> state($this -> sn) -> getLaundryData('email');
         //hp 
         $hp = $this -> state($this -> sn) -> getLaundryData('hp');
         $data['hp']                = $hp;
         $this -> toJson($data);
    }

    public function getInfoPelanggan()
    {
        $kodeService                = $this -> inp('kodeService');
        $qKartuLaundry              = $this -> state($this -> sn) -> getInfoPelanggan($kodeService);
        $pelanggan                  = $qKartuLaundry['pelanggan'];
        //cari nama pelanggan 
        $qNamaPelanggan             = $this -> state($this -> sn) -> getDataPelanggan($pelanggan);
        $data['namaPelanggan']      = $qNamaPelanggan['nama_lengkap'];
        $data['emailPelanggan']     = $qNamaPelanggan['email'];
        $data['alamatPelanggan']    = $qNamaPelanggan['alamat'];
        $this -> toJson($data);
    }

    public function getInfoBeranda()
    {
        //cari jumlah pelanggan 
        $jlhPelanggan           = $this -> state($this -> sn) -> getJumlahPelanggan();
        $data['jlhPelanggan']   = $jlhPelanggan;
        //cari jumlah cucian 
        $jlhCucian              = $this -> state($this -> sn) -> getJumlahCucian();
        $data['jlhCucian']      = $jlhCucian;
        $this -> toJson($data);
    }

    public function getListBulan()
    {
        $dbdata     = array();
        $jlhBulan   = 12;
        $bulan      = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        for ($x = 0; $x < $jlhBulan ; $x++) {
            $arrTemp['bulan']   = $bulan[$x];
            $dbdata[]           = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
   
}