<?php

class Pelanggan extends Route{

    private $sn = 'pelangganData';

    public function index()
    {
      $this -> cekUserLogin('userSes','login');
      $data['pelanggan'] = $this -> state($this -> sn) -> pelangganDataAll();
      $this -> bind('/dasbor/pelanggan/pelanggan', $data);
    }

    public function formTambahPelanggan()
    {
      $this -> cekUserLogin('userSes','login');
      $this -> bind('dasbor/pelanggan/formTambahPelanggan');
    }

    public function proTambahPelanggan()
    {
      $data['username']         = $this -> inp('username');
      $data['namaLengkap']      = $this -> inp('namaLengkap');
      $data['alamat']           = $this -> inp('alamat');
      $data['nomorHandphone']   = $this -> inp('nomorHandphone');
      $data['email']            = $this -> inp('email');
      $data['levelUser']        = $this -> inp('levelUser');
      $usernameParam            = $this -> inp('username');
      $usernameFilter           = str_replace(' ', '',$usernameParam);
      $data['waktu']            = $this -> waktu();
      //cek apakah username sudah terdaftar
      $jlhUser                  = $this -> state($this -> sn) -> cekUsername($usernameFilter);

      if($jlhUser > 0){
        $dataRes['status'] = 'error';
      }else{
        $this -> state($this -> sn) -> prosesTambahPelanggan($data, $usernameFilter);
        $dataRes['status'] = 'sukses';
      }
      $this -> toJson($dataRes);
    }
 
    public function pelangganProfile($username)
    {
      $data['username']       = $username;
      $data['historyCucian']  = $this -> state($this -> sn) -> historyKartuLaundryPelanggan($username);
      $this -> bind('dasbor/pelanggan/pelangganProfile', $data);
    }

    public function formEditProfilePelanggan(){
      $data['username'] = $this -> inp('username');
      $this -> bind('dasbor/pelanggan/formEditProfilePelanggan', $data);
    }

    public function proEditProfilePelanggan()
    {
      $data['username']         = $this -> inp('username');
      $data['namaLengkap']      = $this -> inp('namaLengkap');
      $data['alamat']           = $this -> inp('alamat');
      $data['nomorHandphone']   = $this -> inp('nomorHandphone');
      $data['email']            = $this -> inp('email');
      $data['levelUser']        = $this -> inp('levelUser');
      //update profile pelanggan ke database
      $this -> state($this -> sn) -> prosesUpdatePelanggan($data);
      $dataRes['status']        = 'sukses';
      $this -> toJson($dataRes);
    }

    public function historyCucianPelanggan($username)
    {
     
    }

}
