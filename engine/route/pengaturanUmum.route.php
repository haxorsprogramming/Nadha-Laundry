<?php

class pengaturanUmum extends Route{

   public function __construct()
   {
        $this -> st = new state;
   }

    public function index()
    {
        $this -> bind('dasbor/pengaturanUmum/pengaturanUmum');
    }

    public function getDataPengaturan()
    {
        $dbdata = array();
        $this -> st -> query("SELECT * FROM tbl_setting_laundry;");
        $data['dataPengaturan'] = $this -> st -> queryAll();
        foreach($data['dataPengaturan'] as $dp){
            $arrTemp['kdSetting'] = $dp['kd_setting'];
            $arrTemp['caption'] = $dp['caption'];
            $arrTemp['value'] = $dp['value'];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

    public function tesKirimPesan()
    {
        $penerima = 'dindananinda@gmail.com';
        $judul = 'Status Cucian';
        $isi = 'Halo dinda, cucian kamu telah selesai. Silahkan ambil di laundry ya .. :)';
        $statusKirim = $this -> kirimEmail($penerima, $judul, $isi);
        echo $statusKirim;
    }

    public function formEditPengaturan($kdSetting)
    {
        $this -> st -> query("SELECT * FROM tbl_setting_laundry WHERE kd_setting='$kdSetting';");
        $data['dataSetting'] = $this -> st -> querySingle();
        $this -> bind('dasbor/pengaturanUmum/formEditPengaturan', $data);
    }

    public function prosesEditPengaturan()
    {
        // 'kdSetting' : this.kdSetting, 'caption': caption, 'value': value
        $kdSetting = $this -> inp('kdSetting');
        $caption = $this -> inp('caption');
        $value = $this -> inp('value');
        $qEdit = "UPDATE tbl_setting_laundry SET value='$value' WHERE kd_setting='$kdSetting';";
        $this -> st -> query($qEdit);
        $this -> st -> queryRun();
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}