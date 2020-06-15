<?php

class bantuan extends Route{

    public function __construct()
    {
     $this -> st = new state;
    }

    public function index()
    {
        $this -> st -> query("SELECT * FROM tbl_bantuan;");
        $data['bantuan'] = $this -> st -> queryAll();
        $this -> bind('dasbor/bantuan/bantuan', $data);
    }


}