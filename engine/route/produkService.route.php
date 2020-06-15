<?php

class produkService extends Route{

    private $sn = 'produkServiceData';

    public function index()
    {
      $this -> cekUserLogin('userSes','login');
      $data['produkService'] = $this -> state($this -> sn) -> produkService();
      $this -> bind('dasbor/produkService/produkService', $data);
    }

    public function formTambahProdukService()
    {
       $data['bHuruf']  = $this -> rnstr(15);
       $data['bAngka']  = $this -> rnint(9);
       $data['kode']    = $this -> state($this -> sn) -> kodeProdukBaru($data);
       $this -> bind('dasbor/produkService/formTambahProdukService', $data);
    }

    public function proTambahProdukService()
    {
      $data['kdProduk']     = $this -> inp('kdProduk');
      $data['namaProduk']   = $this -> inp('namaProduk');
      $data['deksProduk']   = $this -> inp('deksProduk');
      $data['satuanProduk'] = $this -> inp('satuanProduk');
      $data['hargaProduk']  = $this -> inp('hargaProduk');
      //cek apakah kd produk sudah ada
      $this -> state($this -> sn) -> proTambahProduk($data);
      $dataRes['status']    = 'sukses';
      $this -> toJson($dataRes);
    }

  } 
