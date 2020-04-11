<?php
$dataPembayaran = $data['qPembayaran'];
$kdPembayaran = $dataPembayaran['kd_pembayaran'];
$kdService = $dataPembayaran['kd_kartu'];
$total = $dataPembayaran['total_final'];
//cari nama pelanggan 
$this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
$qKartuLaundry = $this -> st -> querySingle();
$pelanggan = $qKartuLaundry['pelanggan'];
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
        <td>2020-04-11 - 08:39:19</td>
      </tr>
      <tr>
        <tr>
          <td style="padding-right:62px;">Costumer</td>
          <td><?=$pelanggan; ?></td>
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
  <tr>
        <td>Pangkas Basic (nama_style_1)</td>
        <td></td>
        <td style="text-align: right;">Rp. 20,000</td>
      </tr>
</table>
</div>
</div>
- - - - - - - - - - - - - - - - - - - - - - - - -
    <table>
      <tr>
        <td style="padding-right:62px;">Sub Total</td>
        <td>Rp. 20,000</td>
      </tr>
      <tr>
        <td style="padding-right:62px;">Diskon</td>
        <td>Rp. 0</td>
      </tr>
      <tr>
        <td style="padding-right:62px;">Total</td>
        <td>Rp. <?=number_format($total); ?></td>
      </tr>
      <tr>
        <tr>
          <td style="padding-right:62px;">Non-Tunai</td>
          <td>Rp. -</td>
        </tr>
        <tr>
        <td style="padding-right:62px;">Kembali</td>
        <td>Rp. 30,000</td>
      </tr>
    </table>
    - - - - - - - - - - - - - - - - - - - - - - - - -<br/>
<div style="">
    Terima kasih , Jaka, <br/>
    anda mendapatkan 1 point dari transaksi ini<br/>
    Total point anda 5</div>
    - - - - - - - - - - - - - - - - - - - - - - - - -<br/>
    Bawa struk ini untuk menukarkan 10 point<br/>
    Dengan 1 kali regular out
    </div>
 </html>
