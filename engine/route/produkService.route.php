<?php

class produkService extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

    public function index()
    {
      $this -> cekUserLogin('userSes');
      $this -> st -> query("SELECT * FROM tbl_service WHERE aktif='y' ORDER BY id DESC;");
      $data['produkService'] = $this -> st -> queryAll();
      $this -> bind('dasbor/produkService/produkService', $data);
    }

    public function formTambahProdukService()
    {
       $bHuruf = "QWERTYUIOPLKJHGFDSAZXCVBNM";
       $bAngka = "1234567890";
       $acakHuruf_1 = str_shuffle($bHuruf);
       $acakHuruf_2 = str_shuffle($bHuruf);
       $acakAngka = str_shuffle($bAngka);
       $data['kode'] = substr($acakHuruf_1, 0, 3).substr($acakAngka, 0, 5).substr($acakHuruf_2, 0, 2);

       $this -> bind('dasbor/produkService/formTambahProdukService', $data);
    }

    public function proTambahProdukService()
    {
      $data['kdProduk'] = $this -> inp('kdProduk');
      $data['namaProduk'] = $this -> inp('namaProduk');
      $data['deksProduk'] = $this -> inp('deksProduk');
      $data['satuanProduk'] = $this -> inp('satuanProduk');
      $data['hargaProduk'] = $this -> inp('hargaProduk');
      //cek apakah kd produk sudah ada
      $query = "INSERT INTO tbl_service VALUES (null, :kd_service, :nama, :deks, :satuan, :harga, 'y');";
      $this -> st -> query($query);
      $this -> st -> querySet('kd_service', $data['kdProduk']);
      $this -> st -> querySet('nama', $data['namaProduk']);
      $this -> st -> querySet('deks', $data['deksProduk']);
      $this -> st -> querySet('satuan', $data['satuanProduk']);
      $this -> st -> querySet('harga', $data['hargaProduk']);
      $this -> st -> queryRun();
      $dataRes['status'] = 'sukses';
      $this -> toJson($dataRes);
    }

  }
