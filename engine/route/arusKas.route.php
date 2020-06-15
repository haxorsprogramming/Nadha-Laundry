<?php

class arusKas extends Route{

    private $sn = 'arusKasData';

    public function index()
    {        
        $data['arusKas']    = $this -> state($this -> sn) -> getArusKas();
        $data['waktu']      = $this -> waktu();
        //cari saldo awal kas
        $data['saldo']      = $this -> state('utilityData') -> getLaundryData('saldo_awal');
        $this -> bind('dasbor/arusKas/arusKas', $data);
    }
  
}