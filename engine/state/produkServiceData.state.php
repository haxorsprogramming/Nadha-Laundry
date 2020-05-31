<?php

class produkServiceData{
  
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function produkService()
  {
    $this -> st -> query("SELECT * FROM tbl_service WHERE aktif='y' ORDER BY id DESC;");
    return $this -> st -> queryAll();
  }

  public function totalTransaksiProduk($kdService)
  {
    $this -> st -> query("SELECT id FROM tbl_temp_item_cucian WHERE kd_item='$kdService';");
    return $this -> st -> numRow();
  }

  public function kodeProdukBaru($data)
  {
    $bHuruf = $data['bHuruf'];
    $bAngka = $data['bAngka'];
    $acakHuruf_1 = str_shuffle($bHuruf);
    $acakHuruf_2 = str_shuffle($bHuruf);
    $acakAngka = str_shuffle($bAngka);
    return substr($acakHuruf_1, 0, 3).substr($acakAngka, 0, 5).substr($acakHuruf_2, 0, 2);
  }

  public function proTambahProduk($data)
  {
    $query = "INSERT INTO tbl_service VALUES (null, :kd_service, :nama, :deks, :satuan, :harga, 'y');";
    $this -> st -> query($query);
    $this -> st -> querySet('kd_service', $data['kdProduk']);
    $this -> st -> querySet('nama', $data['namaProduk']);
    $this -> st -> querySet('deks', $data['deksProduk']);
    $this -> st -> querySet('satuan', $data['satuanProduk']);
    $this -> st -> querySet('harga', $data['hargaProduk']);
    $this -> st -> queryRun();
  }

}