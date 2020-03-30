<?php

class laundryRoom extends Route{

   public function __construct()
   {
   $this -> st = new state;
   }

   public function index()
   {
    $this -> cekUserLogin('userSes');
    $this -> st -> query("SELECT * FROM tbl_laundry_room WHERE status!='finish' ORDER BY id DESC;");
    $data['laundryRoom'] = $this -> st -> queryAll();
    $this -> bind('dasbor/laundryRoom/laundryRoom', $data);
   }

}
