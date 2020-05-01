<?php

class laporanTransaksi extends Route{

   public function __construct()
   {
        $this -> st = new state;
   }

    public function index()
    {
        $this -> bind('dasbor/laporanTransaksi/laporanTransaksi');
    }

}