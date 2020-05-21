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

    public function prosesTambahPromo()
    {
        // 'kdPromo':kdPromo, 'deks':deks, 'diskon':diskon
        $kdPromo = $this -> inp('kdPromo');
        $deks = $this -> inp('deks');
        $diskon = $this -> inp('diskon');
        //cek apakah kd promo sudah ada 
        $this -> st -> query("SELECT id FROM tbl_promo_code WHERE kd_promo='$kdPromo';");
        $jlhKode = $this -> st -> numRow();
        if($jlhKode == 1){
            $data['status'] = 'exist';
        }else{
            //proses simpan ke database
            $querySimpan = "INSERT INTO tbl_promo_code VALUES(null, '$kdPromo', '$deks','$diskon','2020-05-22','2020-05-22','100','y');";
            $this -> st -> query($querySimpan);
            $this -> st -> queryRun();
            $data['status'] = 'success';
        }
        
        $this -> toJson($data);
    }
  

}