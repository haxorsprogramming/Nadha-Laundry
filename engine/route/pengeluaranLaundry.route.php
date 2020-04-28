<?php

class pengeluaranLaundry extends Route{
    
    public function __construct()
    {
    $this -> st = new state;
    }

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
        // 'kdPengeluaran': this.kdPengeluaran, 'namaPengeluaran': this.namaPengeluaran, 'deks': this.deks, 'jumlah':this.jumlah
        $kd = $this -> inp('kdPengeluaran');
        $nama = $this -> inp('namaPengeluaran');
        $deks = $this -> inp('deks');
        $jumlah = $this -> inp('jumlah');
        $tanggal = $this -> inp('tanggal');
        $operator = $this -> getses('userSes');
        $qSimpan = "INSERT INTO tbl_pengeluaran VALUES(null, '$kd', '$nama', '$deks', '$tanggal', '$jumlah', '$operator');";
        $this -> st -> query($qSimpan);
        $this -> st -> queryRun();
        //simpan data ke arus kas
        $kdKas = $this -> rnstr(15);
        $asal = 'pengeluaran_laundry';
        $arus = 'keluar';
        $waktuTemp = $this -> waktu();
        $operator = 'admin';
        $qSimpanKeArusKas = "INSERT INTO tbl_arus_kas VALUES(null, '$kdKas', '$kd', '$asal', '$arus', '$jumlah', '$waktuTemp', '$operator');";
        $this -> st -> query($qSimpanKeArusKas);
        $this -> st -> queryRun();
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function getDataPengeluaran()
    {
        $dbdata = array();
        $this -> st -> query("SELECT * FROM tbl_pengeluaran;");
        $data['dataPengeluaran'] = $this -> st -> queryAll();
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
        $qHapusPembayaran = "DELETE FROM tbl_pengeluaran WHERE kd_pengeluaran='$kdPengeluaran';";
        $this -> st -> query($qHapusPembayaran);
        $this -> st -> queryRun();
        //hapus dari tabel arus kas
        $qHapusArusKas = "DELETE FROM tbl_arus_kas WHERE kd_tracking='$kdPengeluaran';";
        $this -> st -> query($qHapusArusKas);
        $this -> st -> queryRun();
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}