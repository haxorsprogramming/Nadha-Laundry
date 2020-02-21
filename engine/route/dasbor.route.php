<?php

class Dasbor extends Route{

    public function __construct()
    {
    $this -> st = new state;
    
    }

    public function index()
    {     
        $this -> cekUserLogin('userSes');
        $this -> bind('/dasbor/index');
    }

    public function beranda()
    {
        $this -> bind('/dasbor/beranda');   
    }

    public function logOut()
    {
        $this -> destses();
        $this -> goto(HOMEBASE.'login');
    }

}