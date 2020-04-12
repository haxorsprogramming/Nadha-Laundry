<?php
$dataPembayaran = $data['qPembayaran'];
$kdPembayaran = $dataPembayaran['kd_pembayaran'];
$kdService = $dataPembayaran['kd_kartu'];
$total = $dataPembayaran['total_final'];
$totalCuci = $dataPembayaran['total_cuci'];
$diskon = $dataPembayaran['diskon'];
$tunai = $dataPembayaran['tunai'];
$kembali = $tunai - $total;
$waktu = $dataPembayaran['waktu'];
$waktuIndo = date('d M Y', strtotime($waktu));
//cari nama pelanggan 
$this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
$qKartuLaundry = $this -> st -> querySingle();
$pelanggan = $qKartuLaundry['pelanggan'];
$this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$pelanggan';");
$qNamaPelanggan = $this -> st -> querySingle();
$namaPelanggan = $qNamaPelanggan['nama_lengkap'];
//cari list item 
$this -> st -> query("SELECT * FROM tbl_temp_item_cucian WHERE kd_room='$kdService';");
$qListItem = $this -> st -> queryAll();
//explode nama awal 
$bahanExplodeNama = explode(" ", $namaPelanggan);
$namaBawah = $bahanExplodeNama[0];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cetak Struk</title>
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
    <script>
    $(document).ready(function(){
      window.print();
    });
    </script>
  </head>
  <body style="font-family: 'VT323', monospace;font-size:15px;margin-left:12px;width:25%;">
<div class="row">
<div class="col-sm-5">
    <div style="margin-bottom:14px;text-align:center;">
        <strong>Nadha Laundry</strong><br/>
        <small>Jln. Pantai Cermin, No. 59, Perbaungan</small>
    </div>
    <table>
      <tr>
        <td style="padding-right:62px;">No Transaksi</td>
        <td><?=$kdPembayaran; ?></td>
      </tr>
      <tr>
        <td style="padding-right:62px;">Tanggal</td>
        <td><?=$waktuIndo; ?></td>
      </tr>
      <tr>
        <tr>
          <td style="padding-right:62px;">Costumer</td>
          <td><?=$namaPelanggan; ?></td>
        </tr>
    </table>

    **Items &amp; Service***<br/>
  </div>
</div>
<div class="row">
<div class="col-sm-5">
<table>
    <tr>
        <td>Items</td>
        <td>Qt</td>
        <td>Total</td>
    </tr>
<?php foreach($qListItem as $qL): 
  $kdItem = $qL['kd_item'];
  $qt = $qL['qt'];
  $totalTemp = $qL['total'];
  //cari nama item dari kode item 
  $this -> st -> query("SELECT nama, satuan FROM tbl_service WHERE kd_service='$kdItem';");
  $qNamaService = $this -> st -> querySingle();
  $namaService = $qNamaService['nama'];
  $satuan = $qNamaService['satuan'];
  ?>
  <tr>
        <td><?=$namaService; ?></td>
        <td><?=$qt; ?> <?=$satuan; ?></td>
        <td style="text-align: right;">Rp. <?=number_format($totalTemp); ?></td>
  </tr>
<?php endforeach ?>
</table>
</div>
</div>
- - - - - - - - - - - - - - - - - - - - - - - - -
    <table>
      <tr>
        <td style="padding-right:62px;">Sub Total</td>
        <td>Rp. <?=number_format($totalCuci); ?></td>
      </tr>
      <tr>
        <td style="padding-right:62px;">Diskon</td>
        <td>Rp. <?=number_format($diskon); ?></td>
      </tr>
      <tr>
        <td style="padding-right:62px;">Total</td>
        <td><b>Rp. <?=number_format($total); ?></b></td>
      </tr>
      <tr>
        <tr>
          <td style="padding-right:62px;">Tunai</td>
          <td>Rp. <?=number_format($tunai); ?></td>
        </tr>
        <tr>
        <td style="padding-right:62px;">Kembali</td>
        <td>Rp. <?=number_format($kembali); ?></td>
      </tr>
    </table>
    - - - - - - - - - - - - - - - - - - - - - - - - -<br/>
<div style="">
    Terima kasih <?=$namaBawah; ?>, <br/>
    anda mendapatkan 1 point dari transaksi ini<br/>
    Total point anda 5</div>
    - - - - - - - - - - - - - - - - - - - - - - - - -<br/>

    </div>
 </html>
