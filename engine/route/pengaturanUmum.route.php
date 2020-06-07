<?php

class pengaturanUmum extends Route{

    public function index()
    {
        $this -> bind('dasbor/pengaturanUmum/pengaturanUmum');
    }

    public function getDataPengaturan()
    {
        $dbdata = array();
        $data['dataPengaturan'] = $this -> state('pengaturanUmumData') -> getDataPengaturan();
        foreach($data['dataPengaturan'] as $dp){
            $arrTemp['kdSetting'] = $dp['kd_setting'];
            $arrTemp['caption'] = $dp['caption'];
            $arrTemp['value'] = $dp['value'];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }
 
    public function formEditPengaturan($kdSetting)
    {
        $data['dataSetting'] = $this -> state('pengaturanUmumData') -> formEditPengaturan($kdSetting);
        $this -> bind('dasbor/pengaturanUmum/formEditPengaturan', $data);
    }

    public function prosesEditPengaturan()
    {
        $kdSetting = $this -> inp('kdSetting');
        $caption = $this -> inp('caption');
        $value = $this -> inp('value');
        $this -> state('pengaturanUmumData') -> prosesEditPengaturan($value, $kdSetting);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}