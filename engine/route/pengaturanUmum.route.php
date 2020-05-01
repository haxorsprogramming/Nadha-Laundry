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

}