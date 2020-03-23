<div class="container">
  <div style='margin-bottom:15px;' id='divOperasi'>
  <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPelanggan'><i class="fas fa-plus-circle">
  </i> Registrasi Cucian Pelanggan</a>
  </div>
  <div class="row" id='divLevelUser'>
  <table id='tblKartuLaundry' class='table'>
    <thead>
      <tr>
        <td>Kd Kartu</td><td>Pelanggan</td><td>Status</td><td>Masuk</td><td>Keluar</td><td>Aksi</td>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($data['kartuLaundry'] as $kartu) :
       ?>
       <tr>
  <td>Kd Kartu</td>
  <td><?=$kartu['pelanggan']; ?></td>
  <td>Status</td>
  <td><?=$kartu['waktu_mulai']; ?></td>
  <td>Keluar</td>
  <td><button class="btn btn-sm btn-primary">Detail</button></td>
       </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/kartuLaundry.js"></script>
