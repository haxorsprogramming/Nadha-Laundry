<?php

class Pelanggan extends Route{

    public function __construct()
    {
    $this -> st = new state;
    }

    public function index()
    {
        $this -> cekUserLogin('userSes');
        $this -> st -> query("SELECT * FROM tbl_pelanggan ORDER BY id DESC;");
        $data['pelanggan'] = $this -> st -> queryAll();
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
      $waktu = $this -> waktu();
      //cek apakah username sudah terdaftar
      $this -> st -> query("SELECT id FROM tbl_pelanggan WHERE username='$usernameFilter';");
      $jlhUser = $this -> st -> numRow();

      if($jlhUser > 0){
        $dataRes['status'] = 'error';
      }else{
        $query = "INSERT INTO tbl_pelanggan VALUES (null, :username, :nama_lengkap, :alamat, :hp, :email, :level, 0, 0, '1','$waktu');";
        $this -> st -> query($query);
        $this -> st -> querySet('username',$usernameFilter);
        $this -> st -> querySet('nama_lengkap',$data['namaLengkap']);
        $this -> st -> querySet('alamat',$data['alamat']);
        $this -> st -> querySet('hp',$data['nomorHandphone']);
        $this -> st -> querySet('email',$data['email']);
        $this -> st -> querySet('level',$data['levelUser']);
        $this -> st -> queryRun();
        $dataRes['status'] = 'sukses';
      }
      $this -> toJson($dataRes);
    }
 
    public function pelangganProfile()
    {
      $username = $this -> inp('username');
      $data['username'] = $username;
      //history cucian 
      $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE pelanggan='$username';");
      $data['historyCucian'] = $this -> st -> queryAll();
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

      $query = "UPDATE tbl_pelanggan SET nama_lengkap=:nama_lengkap, alamat=:alamat, hp=:hp, email=:email, level=:level WHERE username=:username;";
      $this -> st -> query($query);
      $this -> st -> querySet('username',$data['username']);
      $this -> st -> querySet('nama_lengkap',$data['namaLengkap']);
      $this -> st -> querySet('alamat',$data['alamat']);
      $this -> st -> querySet('hp',$data['nomorHandphone']);
      $this -> st -> querySet('email',$data['email']);
      $this -> st -> querySet('level',$data['levelUser']);
      $this -> st -> queryRun();
      $dataRes['status'] = 'sukses';
      $this -> toJson($dataRes);
    }

    public function historyCucianPelanggan($username)
    {
      echo $username;
    }

}
