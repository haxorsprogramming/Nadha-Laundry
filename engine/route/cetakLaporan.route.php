<?php

require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class cetakLaporan extends Route{

    private $sn = 'cetakLaporanData';

    public function index()
    {
        echo '<pre>Cetak laporan route</pre>';
    }

    public function tahun($tahun)
    {
        //inisialisasi awal dompdf
        $dompdf         = new Dompdf();
        $jumlahBulan    = 12;
        //inisialisasi variabel awal -> nama laundry 
        $namaLaundry    = $this -> state('utilityData') -> getLaundryData('laundry_name');
        //buat template html
        $html           = '<div><h2>Laporan Tahunan Laundry</h2>';
        $html          .= '<p>Nama Laundry : '.$namaLaundry.'<br/>Tahun Laporan : '.$tahun;
        $html          .= '<table border="1" width="100%" style="border-collapse: collapse; border: 0px;font-size:14px;">
        <tr><th>Bulan</th><th>Total Transaksi Masuk</th><th>Total Transaksi Keluar</th><th>Nominal Transaksi Masuk</th><th>Nominal Transaksi Keluar</th>
        <th>Total Profit</th>
        </tr>';
        //inisialisasi variabel kosong
        $totalTransaksiTahun        = 0;
        $totalTransaksiTahunKeluar  = 0;
        $nominalTransaksiMasuk      = 0;
        $nominalTransaksiKeluar     = 0;
        //ambil jumlah hari dalam bulan
        $arrBulanInt                = $this -> getListBulanInt();

        for($i = 0; $i < $jumlahBulan; $i++){
            $blnInt             = $arrBulanInt[$i];
            //cari nama bulan berdasarkan array
            $bulanCapIndo       = $this -> bulanIndo($blnInt);
            $jlhDay             = $this -> ambilHari($blnInt);
            $tglAkhir           = $jlhDay;
            $tglAwalKomplit     = $tahun."-".$blnInt."-01 00:00:00";
            $tglAkhirKomplit    = $tahun."-".$blnInt."-".$tglAkhir." 23:59:59";
            //rekap transaksi masuk
            $totalTransaksiBulan = $this -> state($this -> sn) -> getCountRekapTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksi = $this -> state($this -> sn) -> getRekapTransaksiMasuk($tglAwalKomplit, $tglAkhirKomplit);
            $totalNilaiTransaksiBulanan = 0;
            foreach($qTransaksi as $qt){
                $nilaiTransaksi             = $qt['jumlah'];
                $totalNilaiTransaksiBulanan = $totalNilaiTransaksiBulanan + $nilaiTransaksi;
            }
            $capTotalTransaksiBulanan   = number_format($totalNilaiTransaksiBulanan);
            $totalTransaksiTahun        = $totalTransaksiTahun + $totalTransaksiBulan;
            $nominalTransaksiMasuk      = $nominalTransaksiMasuk + $totalNilaiTransaksiBulanan;
            $capNominalTransaksiMasuk   = number_format($nominalTransaksiMasuk);
            //rekap transaksi keluar 
            
            $totalTransaksiBulanKeluar      = $this -> state($this -> sn) -> getCountRekapTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksiKeluar               = $this -> state($this -> sn) -> getRekapTransaksiKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $totalTransaksiBulananKeluar    = 0;
            foreach($qTransaksiKeluar as $qtk){
                $nilaiTransaksiKeluar           = $qtk['jumlah'];
                $totalTransaksiBulananKeluar    = $totalTransaksiBulananKeluar + $nilaiTransaksiKeluar;
            }
            $capTotalTransaksiBulananKeluar = number_format($totalTransaksiBulananKeluar);
            $totalTransaksiTahunKeluar      = $totalTransaksiTahunKeluar + $totalTransaksiBulanKeluar;
            $nominalTransaksiKeluar         = $nominalTransaksiKeluar + $totalTransaksiBulananKeluar;
            $capNominalTransaksiKeluar      = number_format($nominalTransaksiKeluar);
            //total profit
            $totalProfit                    = $totalNilaiTransaksiBulanan - $totalTransaksiBulananKeluar;
            $capTotalProfit                 = number_format($totalProfit);
            //buat body untuk pdf
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

    public function bulan($bulan,$tahun)
    {
        $dompdf         = new Dompdf();
        //inisialisasi variabel awal -> nama laundry
        $namaLaundry    = $this -> state('utilityData') -> getLaundryData('laundry_name');
        //ubah nama bulan ke lowercase
        $bulanLowCase   = strtolower($bulan);
        //ubah bulan ke int
        $bulanInt       = $this -> bulanToInt($bulanLowCase);

        //cari jumlah hari dalam bulan 
        $jlhDay     = $this -> ambilHari($bulanInt);
        $dim        = '-';
        $html       = '<div><h2>Laporan Bulanan Laundry</h2>';
        $html      .= '<p>Nama Laundry : '.$namaLaundry.'<br/>Bulan Laporan : '.$bulan.' '.$tahun;
        $html      .= '<table border="1" width="100%" style="border-collapse: collapse; border: 0px;font-size:13px;">
        <tr><th>Tanggal</th><th>Total Transaksi Masuk</th><th>Total Transaksi Keluar</th><th>Nominal Transaksi Masuk</th><th>Nominal Transaksi Keluar</th>
        <th>Total Profit</th>
        </tr>';
        $totalTransaksiTanggal          = 0;
        $totalTransaksiTanggalKeluar    = 0;
        $nominalTransaksiTanggal        = 0;
        $nominalTransaksiTanggalKeluar  = 0;
       
        //rekap transaksi masuk
        for($i = 1; $i <= $jlhDay; $i++){
            //mulai ribetnya coy
            $tglNow             = $this -> getTanggalBedaDigit($i);
            $tglAwalKomplit     = $tahun."-".$bulanInt."-".$tglNow." 00:00:00";
            $tglAkhirKomplit    = $tahun."-".$bulanInt."-".$tglNow." 23:59:59";
            $profit             = 0;
            
            $jlhTransaksi       = $this -> state($this -> sn) -> jlhTransaksiBulan($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksi         = $this -> state($this -> sn) -> getTransaksiBulan($tglAwalKomplit, $tglAkhirKomplit);
            $nominalTransaksi   = 0;
            foreach($qTransaksi as $qt){
                $tempTransaksi      = $qt['jumlah'];
                $nominalTransaksi   = $nominalTransaksi + $tempTransaksi;
            }
            $capNominalTransaksi        = number_format($nominalTransaksi);
            $totalTransaksiTanggal      = $totalTransaksiTanggal + $jlhTransaksi;
            $nominalTransaksiTanggal    = $nominalTransaksiTanggal + $nominalTransaksi;
            $capNominalTransaksiTanggal = number_format($nominalTransaksiTanggal);
            //rekap transaksi keluar
            
            $jlhTransaksiKeluar     = $this -> state($this -> sn) -> jlhTransaksiBulanKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $qTransaksiKeluar       = $this -> state($this -> sn) -> getTransaksiBulanKeluar($tglAwalKomplit, $tglAkhirKomplit);
            $nominalTransaksiKeluar = 0;
            foreach($qTransaksiKeluar as $qtk){
                $tempTransaksi          = $qtk['jumlah'];
                $nominalTransaksiKeluar = $nominalTransaksiKeluar + $tempTransaksi;
            }
            $capNominalTransaksiKeluar          = number_format($nominalTransaksiKeluar);
            $totalTransaksiTanggalKeluar        = $totalTransaksiTanggalKeluar + $jlhTransaksiKeluar;
            $nominalTransaksiTanggalKeluar      = $nominalTransaksiTanggalKeluar + $nominalTransaksiKeluar;
            $capNominalTransaksiTanggalKeluar   = number_format($nominalTransaksiTanggalKeluar);

            $profit     = $nominalTransaksi - $nominalTransaksiKeluar;
            $capProfit  = number_format($profit);

            $html .= '<tr>
            <td style="padding-left:5px;">'.$tglNow.'</td>
            <td style="padding-left:5px;">'.$jlhTransaksi .'</td>
            <td style="padding-left:5px;">'.$jlhTransaksiKeluar.'</td>
            <td style="padding-left:5px;">Rp. '.$capNominalTransaksi.'</td>
            <td style="padding-left:5px;">Rp. '.$capNominalTransaksiKeluar.'</td>
            <td style="padding-left:5px;">Rp. '.$capProfit.'</td>
            </tr>';
        }
        $html .='</table>';
        $html .= '<p>Total transaksi masuk bulan ini = '.$totalTransaksiTanggal.' transaksi<br/>';
        $html .= 'Total transaksi keluar bulan ini = '.$totalTransaksiTanggalKeluar.' transaksi<br/>';
        $html .= 'Nominal transaksi masuk bulan ini = <b>Rp. '.$capNominalTransaksiTanggal.'</b><br/>';
        $html .= 'Nominal transaksi keluar bulan ini = <b>Rp. '.$capNominalTransaksiTanggalKeluar.'</b><br/>';
        $html .= '</p><p><i>Note : Perhitungan profit tidak dihitungkan dengan modal awal laundry, hasil yg anda lihat pada arus kas mungkin berbeda dengan profit,
        perhitungan profit laporan diatas hanya berdasarkan perbandingan antara transaksi masuk dan keluar setiap bulan<i/></p>';
        $html .="</div>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portait');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('laporan_bulanan.pdf', array("Attachment" => false));
    }


}