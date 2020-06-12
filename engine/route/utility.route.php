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

    public function tesWa(){
        $message = "Apa Kabar, ini pesan dari Nadha-Laundry";
        $phone_no = "082272177022";

        $message = preg_replace("/(\n)/", "", $message);
        $message = preg_replace("/(\r)/", "", $message);

        $phone_no = preg_replace("/(\n)/", ",", $phone_no);
        $phone_no = preg_replace("/(\r)/", "", $phone_no);

        $data = array("phone_no" => $phone_no, "key" => "54d4bbece6348023a3714879f2030ad5a44ff043200750b5", "message" => $message);
        $data_string = json_encode($data);
        $ch = curl_init("http://116.203.92.59/api/send_message");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: '.strlen($data_string))
        );
        $result = curl_exec($ch);

    }

}