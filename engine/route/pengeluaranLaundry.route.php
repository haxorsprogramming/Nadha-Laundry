<?php

class pengeluaranLaundry extends Route{
    
    public function __construct()
    {
    $this -> st = new state;
    }

    public function index()
    {   
        $this -> st -> query("SELECT * FROM tbl_pengeluaran;");
        $data['pengeluaran'] = $this -> st -> queryAll();
        $this -> bind('/dasbor/pengeluaranLaundry/pengeluaranLaundry');
    }
    
    public function formTambahPengeluaran()
    {
        $this -> bind('/dasbor/pengeluaranLaundry/formTambahPengeluaran');
    }
 
}
