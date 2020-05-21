<?php
//arus kas route
class promo extends Route{

    public function __construct()
    {
    $this -> st = new state;
    }
    //route utama
    public function index()
    {
      $this -> bind('dasbor/promo/promo');
    }

    public function getDataPromo()
    {
        $dbdata = array();
        $this -> st -> query("SELECT * FROM tbl_promo_code;");
        $data['dataPromo'] = $this -> st -> queryAll();
        foreach($data['dataPromo'] as $dp){
            $arrTemp['kdPromo'] = $dp['kd_promo'];
            $arrTemp['deks'] = $dp['deks'];
            $arrTemp['diskon'] = $dp['disc'];
            $arrTemp['aktif'] = $dp['aktif'];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
  

}