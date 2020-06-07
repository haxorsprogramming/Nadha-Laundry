<?php

class arusKas extends Route{

    public function index()
    {        
        $data['arusKas'] = $this -> state('arusKasData') -> getArusKas();
        $data['waktu'] = $this -> waktu();
        //cari saldo awal kas
        $data['saldo'] = $this -> state('utilityData') -> getLaundryData('saldo_awal');
        $this -> bind('dasbor/arusKas/arusKas', $data);
    }
  
}