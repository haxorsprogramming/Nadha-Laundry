<?php

class Pelanggan extends Route{

    public function index()
    {
      $this -> cekUserLogin('userSes');
      $data['pelanggan'] = $this -> state('pelangganData') -> pelangganDataAll();
      $this -> bind('/dasbor/pelanggan/pelanggan', $data);
    }

    public function formTambahPelanggan()
    {
      $this -> cekUserLogin('userSes');
      $this -> bind('dasbor/pelanggan/formTambahPelanggan');
    }

    public function proTambahPelanggan()
    {
      $data['username'] = $this -> inp('username');
      $data['namaLengkap'] = $this -> inp('namaLengkap');
      $data['alamat'] = $this -> inp('alamat');
      $data['nomorHandphone'] = $this -> inp('nomorHandphone');
      $data['email'] = $this -> inp('email');
      $data['levelUser'] = $this -> inp('levelUser');
      $usernameParam = $this -> inp('username');
      $usernameFilter = str_replace(' ', '',$usernameParam);
      $data['waktu'] = $this -> waktu();
      //cek apakah username sudah terdaftar
      $jlhUser = $this -> state('pelangganData') -> cekUsername($usernameFilter);

      if($jlhUser > 0){
        $dataRes['status'] = 'error';
      }else{
        $this -> state('pelangganData') -> prosesTambahPelanggan($data, $usernameFilter);
        $dataRes['status'] = 'sukses';
      }
      $this -> toJson($dataRes);
    }
 
    public function pelangganProfile()
    {
      $username = $this -> inp('username');
      $data['username'] = $username;
      $data['historyCucian'] = $this -> state('pelangganData') -> historyKartuLaundryPelanggan($username);
      $this -> bind('dasbor/pelanggan/pelangganProfile', $data);
    }

    public function formEditProfilePelanggan(){
      $data['username'] = $this -> inp('username');
      $this -> bind('dasbor/pelanggan/formEditProfilePelanggan', $data);
    }

    public function proEditProfilePelanggan()
    {
      $data['username'] = $this -> inp('username');
      $data['namaLengkap'] = $this -> inp('namaLengkap');
      $data['alamat'] = $this -> inp('alamat');
      $data['nomorHandphone'] = $this -> inp('nomorHandphone');
      $data['email'] = $this -> inp('email');
      $data['levelUser'] = $this -> inp('levelUser');
      //update profile pelanggan ke database
      $this -> state('pelangganData') -> prosesUpdatePelanggan($data);
      $dataRes['status'] = 'sukses';
      $this -> toJson($dataRes);
    }

    public function historyCucianPelanggan($username)
    {
     
    }

}
