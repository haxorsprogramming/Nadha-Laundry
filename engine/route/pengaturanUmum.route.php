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

    public function tesKirimPesan()
    {
        $penerima = 'alditha.forum@gmail.com';
        $judul = 'Status Cucian';
        $isi = 'Ini kirim email dari fungsi core route';
        $this -> kirimEmail($penerima, $judul, $isi);
    }

}