<?php

class pengaturanUmum extends Route{

    private $sn = 'pengaturanUmumData';

    public function index()
    {
        $this -> bind('dasbor/pengaturanUmum/pengaturanUmum');
    }

    public function getDataPengaturan()
    {
        $dbdata                     = array();
        $data['dataPengaturan']     = $this -> state($this -> sn) -> getDataPengaturan();
        foreach($data['dataPengaturan'] as $dp){
            $arrTemp['kdSetting']   = $dp['kd_setting'];
            $arrTemp['caption']     = $dp['caption'];
            $arrTemp['value']       = $dp['value'];
            $dbdata[]               = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
 
    public function formEditPengaturan($kdSetting)
    {
        $data['dataSetting'] = $this -> state($this -> sn) -> formEditPengaturan($kdSetting);
        $this -> bind('dasbor/pengaturanUmum/formEditPengaturan', $data);
    }

    public function prosesEditPengaturan()
    {
        $kdSetting          = $this -> inp('kdSetting');
        $caption            = $this -> inp('caption');
        $value              = $this -> inp('value');
        $this -> state($this -> sn) -> prosesEditPengaturan($value, $kdSetting);
        $data['status']     = 'sukses';
        $this -> toJson($data);
    }

}