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

}