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
        $penerima = 'dindananinda@gmail.com';
        $judul = 'Status Cucian';
        $isi = 'Halo dinda, cucian kamu telah selesai. Silahkan ambil di laundry ya .. :)';
        $statusKirim = $this -> kirimEmail($penerima, $judul, $isi);

        echo $statusKirim;
    }

}