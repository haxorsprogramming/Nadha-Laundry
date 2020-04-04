<div class="container" id='divKartuLaundry'>
  <div style='margin-bottom:15px;' id='divOperasi'>
    <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPelanggan'>
    <i class="fas fa-plus-circle"></i> {{capButton}}</a>
  </div>
  <div class="row" id='divLevelUser'>
    <table id='tblKartuLaundry' class='table'>
      <thead>
      <tr>
          <th>Kd Kartu</th>
          <th>Pelanggan</th>
          <th>Status</th>
          <th>Waktu</th>
          <th>Total Harga</th>
          <th>Status Pembayaran</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['kartuLaundry'] as $kartu) :
          $pelanggan = $kartu['pelanggan'];
          $kodeService = $kartu['kode_service'];
          $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$pelanggan';");
          $namaPelanggan =  $this -> st -> querySingle(); 
          $statusCuci = $kartu['status'];
          if($statusCuci === 'cuci'){
            $capStat = '<span class="badge badge-info">Laundry Room</span>';
          }else if($statusCuci === 'hold'){
            $capStat = '<span class="badge badge-light">Hold</span>';
          }else if($statusCuci === 'finishlaundry'){
            $capStat = 'Selesai Cuci';
          }
          //cari total harga 
          $this -> st -> query("SELECT total_harga FROM tbl_laundry_room WHERE kd_kartu='$kodeService';");
          $qHarga = $this -> st -> querySingle();
          $totalHarga = $qHarga['total_harga'];
          //cari status pembayaran 
          $statPay = $kartu['pembayaran'];
          if($statPay == 'pending'){
            $capSt = "Belum bayar";
          }else{
            $capSt = "Sudah bayar";
          }
        ?>
          <tr>
            <td><?=$kodeService; ?></td>
            <td><?= $namaPelanggan['nama_lengkap']; ?></td>
            <td><?=$statusCuci; ?></td>
            <td>Masuk : <b><?= $kartu['waktu_masuk']; ?></b><br/>
            Selesai : <b><?=$kartu['waktu_selesai']; ?></b><br/>
            Diambil : <b><?=$kartu['waktu_diambil']; ?></b></b>
            </td>
            <td>Rp. <?=number_format($totalHarga ); ?></td>
            <td><?=$capSt; ?></td>
            <td><button class="btn btn-sm btn-primary"><i class='fas fa-exclamation-circle'></i> Detail</button></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <hr/>
  <div>
  Keterangan status kartu <br/>
  <ul>
  <li><span class="badge badge-light">Hold</span> : Kartu laundry sudah dibuat, pelanggan belum membuat daftar cucian, cucian dapat ditambahkan di menu laundry room</li>
  <li><span class="badge badge-info">Laundry Room</span> : Kartu laundry sudah memiliki antrian di laundry yang memiliki minimal 1 cucian, cucian dapat ditambahkan di menu laundry room</li>
  <li><span class="badge badge-success">Selesai</span> : Cucian telah selesai</li>
  </ul>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/kartuLaundry.js"></script>