<?php

require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class dataTransaksi extends Route{

    public function __construct()
    {
    $this -> st = new state;
    
    }
  
    public function index()
    {  
       $bWaktu = date('Y-m-d');
       $data['waktu'] = $bWaktu;
       $this -> st -> query("SELECT * FROM tbl_pembayaran;");
       $data['dataTransaksi'] = $this -> st -> queryAll();
       $this -> bind('dasbor/dataTransaksi/dataTransaksi', $data);
    }

    public function detailTransaksi()
    {
        $kdTransaksi = $this -> inp('kdTransaksi');
        $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE kd_pembayaran='$kdTransaksi' LIMIT 0,1;");
        $data['dataTransaksi'] = $this -> st -> querySingle();
        $this -> bind('dasbor/dataTransaksi/detailTransaksi', $data);
    }

    public function cetak($kdTransaksi)
    {   
        if(isset($kdTransaksi)){
            $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE kd_pembayaran='$kdTransaksi' LIMIT 0,1;");
            //cari invoice ada atau tidak
            $jlhInvoice = $this -> st -> numRow();
            if($jlhInvoice < 1){
                echo "<code>Kode invoice tidak valid!!!</code>";
                die();
            }else{
                $qTransaksi = $this -> st -> querySingle();
                $kdKartu = $qTransaksi['kd_kartu'];
                $waktuTransaksi = $qTransaksi['waktu'];
                $operator = $qTransaksi['operator'];
                //data footer 
                $totalFinal = $qTransaksi['total_final'];
                $totalCuci = $qTransaksi['total_cuci'];
                $diskon = $qTransaksi['diskon'];
                $tunai = $qTransaksi['tunai'];
                $kembali = $tunai - $totalFinal;
                //query ambil list item 
                $this -> st -> query("SELECT * FROM tbl_temp_item_cucian WHERE kd_room='$kdKartu';");
                $qListItem = $this -> st -> queryAll();
                $dompdf = new Dompdf();
                //inisialisasi variabel awal -> nama laundry
                $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='laundry_name' LIMIT 0,1;");
                $qNamaLaundry = $this -> st -> querySingle();
                $namaLaundry = $qNamaLaundry['value'];
                //nama pelanggan 
                $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kdKartu';");
                $qKartuLaundry = $this -> st -> querySingle();
                $pelanggan = $qKartuLaundry['pelanggan'];
                $this -> st -> query("SELECT nama_lengkap,level FROM tbl_pelanggan WHERE username='$pelanggan';");
                $qNamaPelanggan = $this -> st -> querySingle();
                $namaPelanggan = $qNamaPelanggan['nama_lengkap'];
                $levelPelanggan = $qNamaPelanggan['level'];
                //cari bonus point cuci 
                $this -> st -> query("SELECT bonus_point_cuci FROM tbl_level_user WHERE kd_level='$levelPelanggan';");
                $qBonusPoint = $this -> st -> querySingle();
                $bonusPoint = $qBonusPoint['bonus_point_cuci'];
                //explode nama awal 
                $bahanExplodeNama = explode(" ", $namaPelanggan);
                $namaBawah = $bahanExplodeNama[0];
                //header 
                $html = '<div><h2 style="font-size:0.9em;">'.$namaLaundry.'</h2>';
                $html .= '<p style="font-size:0.7em;">No Transaksi : '.$kdTransaksi.'<br/>';
                $html .= 'Pelanggan : '.$namaPelanggan.'<br/>';
                $html .= 'Operator : '.$operator.'<br/>';
                $html .= 'Waktu : '.$waktuTransaksi;
                $html .= '<p style="text-align:center;font-size:0.7em;">Items & Service</p>';
                //table
                $html .= '<table border="1" width="100%" style="border-collapse: collapse; border: 0px;font-size:10px;">';
                $html .= '<tr><td>Items</td><td>Harga @</td><td>Qt</td><td>Total</td></tr>';
                foreach($qListItem as $ql){
                    $kdItem = $ql['kd_item'];
                    //cari nama item dan satuan 
                    $this -> st -> query("SELECT nama, satuan FROM tbl_service WHERE kd_service='$kdItem';");
                    $qItem = $this -> st -> querySingle();
                    $namaItem = $qItem['nama'];
                    $hargaAt = $ql['harga_at'];
                    $quantity = $ql['qt'];
                    $satuan = $qItem['satuan'];
                    $total = $ql['total'];
                    $html .= '<tr><td>'.$namaItem.'</td>
                    <td>Rp. '.number_format($hargaAt).'</td>
                    <td>'.$quantity.' '.$satuan.'</td>
                    <td>Rp. '.number_format($total).'</td></tr>';
                }
                $html .= '</table>';
                //result
                $html .= '<table border="0" style="font-size:10px;">';
                $html .= '<tr><td>Sub Total</td><td style="padding-left:20px;">Rp. '.number_format($totalCuci).'</td></tr>';
                $html .= '<tr><td>Diskon</td><td style="padding-left:20px;">Rp. '.number_format($diskon).'</td></tr>';
                $html .= '<tr><td>Total</td><td style="padding-left:20px;"><b>Rp. '.number_format($totalFinal).'</b></td></tr>';
                $html .= '<tr><td>Tunai</td><td style="padding-left:20px;">Rp. '.number_format($tunai).'</td></tr>';
                $html .= '<tr><td>Kembali</td><td style="padding-left:20px;">Rp. '.number_format($kembali).'</td></tr>';
                $html .= '</table>';
                $html .= '<p style="font-size:0.5em;">Terima kasih '.$namaBawah.', <br/>
                anda mendapatkan '.$bonusPoint.' point dari transaksi ini';
                $html .= '</div>';
                $dompdf->loadHtml($html);
                // Setting ukuran dan orientasi kertas
                $dompdf->setPaper('A6', 'portait');
                // Rendering dari HTML Ke PDF
                $dompdf->render();
                // Melakukan output file Pdf
                $dompdf->stream('invoice.pdf', array("Attachment" => false));
            }
        }else{
            echo "<code>Route tidak valid!!</code>";
        }
        
    }

    public function getDataTransaksi()
    {
        $dbdata = array();
        $this -> st -> query("SELECT * FROM tbl_pembayaran;");
        $data['dataTransaksi'] = $this -> st -> queryAll();
        foreach($data['dataTransaksi'] as $dis){
            $arrTemp['invoice'] = $dis['kd_pembayaran'];
            $kodeService = $dis['kd_kartu'];
            $arrTemp['waktu'] = $dis['waktu'];
            $arrTemp['total'] = $dis['total_final'];
            $arrTemp['kodeService'] = $kodeService;
            //cari username dari tabel kartu laundry 
            $this -> st -> query("SELECT pelanggan FROM tbl_kartu_laundry WHERE kode_service='$kodeService';");
            $qUsername = $this -> st -> querySingle();
            $username = $qUsername['pelanggan'];
            //cari nama pelanggan dari tabel pelanggan 
            $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$username';");
            $qNamaLengkap = $this -> st -> querySingle();
            $arrTemp['namaPelanggan'] = $qNamaLengkap['nama_lengkap'];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

    public function getDataTransaksiRange(){
        $dbdata = array();
        $tglAwal = $this -> inp('tglAwal');
        $tglAkhir = $this -> inp('tglAkhir');
        $tglAwalKomplit = $tglAwal." 00:00:01";
        $tglAkhirKomplit = $tglAkhir." 23:59:59";
        $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE (waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit');");
        $data['dataTransaksiRange'] = $this -> st -> queryAll();
        foreach($data['dataTransaksiRange'] as $dis){
            $arrTemp['invoice'] = $dis['kd_pembayaran'];
            $kodeService = $dis['kd_kartu'];
            $arrTemp['waktu'] = $dis['waktu'];
            $arrTemp['total'] = $dis['total_final'];
            $arrTemp['kodeService'] = $kodeService;
            //cari username dari tabel kartu laundry 
            $this -> st -> query("SELECT pelanggan FROM tbl_kartu_laundry WHERE kode_service='$kodeService';");
            $qUsername = $this -> st -> querySingle();
            $username = $qUsername['pelanggan'];
            //cari nama pelanggan dari tabel pelanggan 
            $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$username';");
            $qNamaLengkap = $this -> st -> querySingle();
            $arrTemp['namaPelanggan'] = $qNamaLengkap['nama_lengkap'];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

}