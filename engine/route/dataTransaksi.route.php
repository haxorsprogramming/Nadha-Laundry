<?php

class dataTransaksi extends Route{

    public function __construct()
    {
    $this -> st = new state;
    
    }

    public function index()
    {     
       $this -> st -> query("SELECT * FROM tbl_pembayaran;");
       $data['dataTransaksi'] = $this -> st -> queryAll();
       $this -> bind('dasbor/dataTransaksi/dataTransaksi', $data);
    }

    public function detailTransaksi()
    {
        $kdTransaksi = $this -> inp('kdTransaksi');
        $this -> bind('dasbor/dataTransaksi/detailTransaksi');
    }

}
