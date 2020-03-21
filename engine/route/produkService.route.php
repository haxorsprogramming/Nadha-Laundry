<?php

class produkService extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

    public function index()
    {
      $this -> cekUserLogin('userSes');
      $this -> st -> query("SELECT * FROM tbl_service ORDER BY id DESC;");
      $data['produkService'] = $this -> st -> queryAll();
      $this -> bind('dasbor/produkService/produkService', $data);
    }

    public function formTambahProdukService()
    {
       $this -> bind('dasbor/produkService/formTambahProdukService');
    }

  }
