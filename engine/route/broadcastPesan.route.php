<?php

class broadcastPesan extends Route{

    private $sn = 'broadcastPesanData';

    public function index()
    {
        $this -> bind('dasbor/broadcastPesan/broadcastPesan');
    }

    public function prosesBroadcast()
    {
        $judulPesan     = $this -> inp('judulPesan');
        $isiPesan       = $this -> inp('isiPesan');
        $tipeProses     = $this -> inp('tipeProses');
        $waktu          = $this -> inp('waktu');
        //buat id pesan
        $idPesan        = $this -> rnstr(10);
        //coba buat regex
        $qPelanggan     = $this -> state($this -> sn) -> getPelanggan();
        //ambil api key 
        $qApiKey        = $this -> state('laundryRoomData') -> getApiKey();
        $apiKey         = $qApiKey['value'];
        $status         = '';

        if($tipeProses == 'langsung'){
            //start broadcast pesan ke pelanggan
            foreach($qPelanggan as $pel){
                $namaPelanggan  = $pel['nama_lengkap'];
                $phone_no       = $pel['hp'];
                $message        = str_replace("{pelanggan}", $namaPelanggan, $isiPesan);
                $this -> broadcastPesan($message, $phone_no, $apiKey);
                $status         = 'sukses';
                $waktu          = $this -> waktu();
            }
        }else{
            $status = 'pending';
        }
        //simpan ke tabel broadcast 
        $this -> state($this -> sn) -> simpanBroadcast($idPesan, $judulPesan, $isiPesan, $tipeProses, $waktu, $status);
        $data['status'] = $qPelanggan;
        $this -> toJson($data);
    }

    public function cronjobBroadcast()
    {
        
    }

    public function hapusPesan()
    {
        $idPesan = $this -> inp('idPesan');
        $data['idPesan'] = $idPesan;
        $this -> state($this -> sn) -> hapusBroadcast($idPesan);
        $this -> toJson($data);
    }

}