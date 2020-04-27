<?php

class arusKas extends Route{

    public function __construct()
    {
    $this -> st = new state;
    }

    public function index()
    {
        $this -> st -> query("SELECT * FROM tbl_arus_kas;");
        $data['arusKas'] = $this -> st -> queryAll();
        $data['waktu'] = $this -> waktu();
        $this -> bind('dasbor/arusKas/arusKas', $data);
    }
  

}