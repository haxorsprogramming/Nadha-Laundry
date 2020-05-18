<?php

require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class utility extends Route{

    public function __construct()
    {
    $this -> st = new state;
    }

    public function cetakLaporan($tahun)
    {
        //inisialisasi awal dompdf
        $dompdf = new Dompdf();
        $jumlahBulan = 12;
        //inisialisasi variabel awal -> nama laundry
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='laundry_name' LIMIT 0,1;");
        $qNamaLaundry = $this -> st -> querySingle();
        $namaLaundry = $qNamaLaundry['value'];
        //buat template html
        $html = '<div><h2>Laporan Tahunan Laundry</h2>';
        $html .= '<p>Nama Laundry : '.$namaLaundry.'<br/>Tahun Laporan : '.$tahun;
        $html .= '<table border="1" width="100%" style="border-collapse: collapse; border: 0px;font-size:14px;">
        <tr><th>Bulan</th><th>Total Transaksi Masuk</th><th>Total Transaksi Keluar</th><th>Nominal Transaksi Masuk</th><th>Nominal Transaksi Keluar</th>
        <th>Total Profit</th>
        </tr>';
        $totalTransaksiTahun = 0;
        $totalTransaksiTahunKeluar = 0;
        $nominalTransaksiMasuk = 0;
        $nominalTransaksiKeluar = 0;

        $arrBulanInt = $this -> getListBulanInt();
        for($i = 0; $i < $jumlahBulan; $i++){
            $blnInt = $arrBulanInt[$i];
            //cari nama bulan berdasarkan array
            $bulanCapIndo = $this -> bulanIndo($blnInt);
            $jlhDay = $this -> ambilHari($blnInt);
            $tglAkhir = $jlhDay;
            $tglAwalKomplit = $tahun."-".$blnInt."-01 00:00:00";
            $tglAkhirKomplit = $tahun."-".$blnInt."-".$tglAkhir." 23:59:59";
            //rekap transaksi masuk
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='masuk';");
            $totalTransaksiBulan = $this -> st -> numRow();
            $qTransaksi = $this -> st -> queryAll();
            $totalNilaiTransaksiBulanan = 0;
            foreach($qTransaksi as $qt){
                $nilaiTransaksi = $qt['jumlah'];
                $totalNilaiTransaksiBulanan = $totalNilaiTransaksiBulanan + $nilaiTransaksi;
            }
            $capTotalTransaksiBulanan = number_format($totalNilaiTransaksiBulanan);
            $totalTransaksiTahun = $totalTransaksiTahun + $totalTransaksiBulan;
            $nominalTransaksiMasuk = $nominalTransaksiMasuk + $totalNilaiTransaksiBulanan;
            $capNominalTransaksiMasuk = number_format($nominalTransaksiMasuk);
            //rekap transaksi keluar 
            $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tglAwalKomplit' AND '$tglAkhirKomplit') AND arus='keluar';");
            $totalTransaksiBulanKeluar = $this -> st -> numRow();
            $qTransaksiKeluar = $this -> st -> queryAll();
            $totalTransaksiBulananKeluar = 0;
            foreach($qTransaksiKeluar as $qtk){
                $nilaiTransaksiKeluar = $qtk['jumlah'];
                $totalTransaksiBulananKeluar = $totalTransaksiBulananKeluar + $nilaiTransaksiKeluar;
            }
            $capTotalTransaksiBulananKeluar = number_format($totalTransaksiBulananKeluar);
            $totalTransaksiTahunKeluar = $totalTransaksiTahunKeluar + $totalTransaksiBulanKeluar;
            $nominalTransaksiKeluar = $nominalTransaksiKeluar + $totalTransaksiBulananKeluar;
            $capNominalTransaksiKeluar = number_format($nominalTransaksiKeluar);
            //total profit
            $totalProfit = $totalNilaiTransaksiBulanan - $totalTransaksiBulananKeluar;
            $capTotalProfit = number_format($totalProfit);
            $html .= '<tr>
            <td style="padding-left:5px;">'.$bulanCapIndo.'</td>
            <td style="padding-left:5px;">'.$totalTransaksiBulan.'</td>
            <td style="padding-left:5px;">'.$totalTransaksiBulanKeluar.'</td>
            <td style="padding-left:5px;">Rp. '.$capTotalTransaksiBulanan.'</td>
            <td style="padding-left:5px;">Rp. '.$capTotalTransaksiBulananKeluar.'</td>
            <td style="padding-left:5px;">Rp. '.$capTotalProfit.'</td>
            </tr>';
        }
        $html .= '</table>';
        $html .= '<p>Total transaksi masuk tahun ini = '.$totalTransaksiTahun.' transaksi<br/>';
        $html .= 'Total transaksi keluar tahun ini = '.$totalTransaksiTahunKeluar.' transaksi<br/>';
        $html .= 'Nominal transaksi masuk tahun ini = <b>Rp. '.$capNominalTransaksiMasuk.'</b><br/>';
        $html .= 'Nominal transaksi keluar tahun ini = <b>Rp. '.$capNominalTransaksiKeluar.'</b><br/>';
        $html .= '</p><p><i>Note : Perhitungan profit tidak dihitungkan dengan modal awal laundry, hasil yg anda lihat pada arus kas mungkin berbeda dengan profit,
        perhitungan profit laporan diatas hanya berdasarkan perbandingan antara transaksi masuk dan keluar setiap bulan<i/></p>';
        $html .="</div>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('laporan_tahun.pdf', array("Attachment" => false));
    }


    public function getInfoLaundry()
    {   
        // nama laundry
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='laundry_name' LIMIT 0,1;");
        $qNamaLaundry = $this -> st -> querySingle();
        $data['namaLaundry'] = $qNamaLaundry['value'];
        // alamat
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='address' LIMIT 0,1;");
        $qAlamatLaundry = $this -> st -> querySingle();
        $data['alamatLaundry'] = $qAlamatLaundry['value'];
        //kota 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='kota' LIMIT 0,1;");
        $qKotaLaundry = $this -> st -> querySingle();
        $data['kotaLaundry'] = $qKotaLaundry['value'];
        //kabupaten 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='kabupaten' LIMIT 0,1;");
        $qKabupatenLaundry = $this -> st -> querySingle();
        $data['kabupatenLaundry'] = $qKabupatenLaundry['value'];
        //provinsi 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='provinsi' LIMIT 0,1;");
        $qProvinsiLaundry = $this -> st -> querySingle();
        $data['provinsiLaundry'] = $qProvinsiLaundry['value'];
        //kode post 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='kode_pos' LIMIT 0,1;");
        $qKodePosLaundry = $this -> st -> querySingle();
        $data['kodePosLaundry'] = $qKodePosLaundry['value'];
        $this -> toJson($data);
    }

    public function getInfoPelanggan()
    {
        $kodeService = $this -> inp('kodeService');
        $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kodeService' LIMIT 0,1;");
        $qKartuLaundry = $this -> st -> querySingle();
        $pelanggan = $qKartuLaundry['pelanggan'];
        //cari nama pelanggan 
        $this -> st -> query("SELECT nama_lengkap, email, alamat FROM tbl_pelanggan WHERE username='$pelanggan';");
        $qNamaPelanggan = $this -> st -> querySingle();
        $data['namaPelanggan'] = $qNamaPelanggan['nama_lengkap'];
        $data['emailPelanggan'] = $qNamaPelanggan['email'];
        $data['alamatPelanggan'] = $qNamaPelanggan['alamat'];
        $this -> toJson($data);
    }

    public function getInfoBeranda()
    {
        //cari jumlah pelanggan 
        $this -> st -> query("SELECT id FROM tbl_pelanggan;");
        $jlhPelanggan = $this -> st -> numRow();
        $data['jlhPelanggan'] = $jlhPelanggan;
        //cari jumlah cucian 
        $this -> st -> query("SELECT id FROM tbl_laundry_room WHERE status='cuci';");
        $jlhCucian = $this -> st -> numRow();
        $data['jlhCucian'] = $jlhCucian;
        $this -> toJson($data);
    }

    public function getListBulan()
    {
        $dbdata = array();
        $jlhBulan = 12;
        $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        for ($x = 0; $x < $jlhBulan ; $x++) {
            $arrTemp['bulan'] = $bulan[$x];
            $dbdata[] = $arrTemp;
        }
        $this -> toJson($dbdata);
    }

}
