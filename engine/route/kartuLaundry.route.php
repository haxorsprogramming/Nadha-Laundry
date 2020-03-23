<?php

class kartuLaundry extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

    public function index()
    {
      $this -> cekUserLogin('userSes');
      $this -> st -> query("SELECT * FROM tbl_kartu_laundry ORDER BY id DESC;");
      $data['kartuLaundry'] = $this -> st -> queryAll();
      $this -> bind('dasbor/kartuLaundry/kartuLaundry', $data);
    }

}
