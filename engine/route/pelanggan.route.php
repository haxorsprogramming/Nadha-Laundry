<?php

class Pelanggan extends Route{

    public function __construct()
    {
    $this -> st = new state;
    }

    public function index()
    {
        $this -> cekUserLogin('userSes');
        $this -> st -> query("SELECT * FROM tbl_pelanggan;");
        $data['pelanggan'] = $this -> st -> queryAll();
        $this -> bind('/dasbor/pelanggan/pelanggan', $data);
    }

    public function formTambahPelanggan()
    {
      $this -> bind('dasbor/pelanggan/formTambahPelanggan');
    }

}
