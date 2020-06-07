<?php

class pengeluaranLaundry extends Route{
    
    public function index()
    {   
        $this -> bind('/dasbor/pengeluaranLaundry/pengeluaranLaundry');
    } 
    
    public function formTambahPengeluaran()
    {
        $digitHuruf = strtoupper($this -> rnstr(3));
        $tgl = date('m')."-".date('Y')."-".$digitHuruf;
        $data['kdPengeluaran'] = $tgl;
        $bWaktu = date('Y-m-d');
        $data['waktu'] = $bWaktu;
        $this -> bind('/dasbor/pengeluaranLaundry/formTambahPengeluaran', $data);
    }

    public function prosesTambahPengeluaran()
    {
        $kd = $this -> inp('kdPengeluaran');
        $nama = $this -> inp('namaPengeluaran');
        $deks = $this -> inp('deks');
        $jumlah = $this -> inp('jumlah');
        $tanggal = $this -> inp('tanggal');
        $operator = $this -> getses('userSes');
        //tambah pengeluaran
        $this -> state('pengeluaranLaundryData') -> prosesTambahPengeluaran($kd, $nama, $deks, $tanggal, $jumlah, $operator);
        //simpan data ke arus kas
        $kdKas = $this -> rnstr(15);
        $asal = 'pengeluaran_laundry';
        $arus = 'keluar';
        $waktuTemp = $this -> waktu();
        $operator = 'admin';
        $this -> state('pengeluaranLaundryData') -> simpanArusKas($kdKas, $kd, $asal, $arus, $jumlah, $waktuTemp, $operator);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function getDataPengeluaran()
    {
        $dbdata = array();
        $data['dataPengeluaran'] = $this -> state('pengeluaranLaundryData') -> dataPengeluaran();
        foreach($data['dataPengeluaran'] as $dis){
            $arrTemp['kdPengeluaran'] = $dis['kd_pengeluaran'];
            $arrTemp['pengeluaran'] = $dis['pengeluaran'];
            $arrTemp['keterangan'] = $dis['keterangan'];
            $waktu = $dis['waktu'];
            $wakEx = explode(" ", $waktu);
            $tanggalAja = $wakEx[0];
            $arrTemp['waktu'] = $tanggalAja;
            $arrTemp['jumlah'] = $dis['jumlah'];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

    public function hapusDataPengeluaran()
    {
        $kdPengeluaran = $this -> inp('kdPengeluaran');
        //hapus dari tabel pembayaran
        $this -> state('pengeluaranLaundryData') -> hapusPengeluaran($kdPengeluaran);
        //hapus dari tabel arus kas
        $this -> state('pengeluaranLaundryData') -> hapusArusKas($kdPengeluaran);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}