<?php
//arus kas route
class arusKas extends Route{

    public function __construct()
    {
    $this -> st = new state;
    }
    //route utama
    public function index()
    {
        $this -> st -> query("SELECT * FROM tbl_arus_kas;");
        $data['arusKas'] = $this -> st -> queryAll();
        $data['waktu'] = $this -> waktu();
        //cari saldo awal kas
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='saldo_awal';");
        $qSaldo = $this -> st -> querySingle();
        $data['saldo'] = $qSaldo['value'];
        $this -> bind('dasbor/arusKas/arusKas', $data);
    }
  

}