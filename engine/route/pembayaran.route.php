<?php

class pembayaran extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

    public function index()
    {
        echo "<pre>route_pembayaran</pre>";
    }

    public function formPembayaran()
    {
        $data['kdReg'] = $this -> inp('kdReg');
        $this -> bind('dasbor/pembayaran/formPembayaran', $data);
    }

}
