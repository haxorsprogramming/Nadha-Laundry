<div class="container" id='divKartuLaundry'>
  <div style='margin-bottom:15px;' id='divOperasi'>
    <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPelanggan'>
    <i class="fas fa-plus-circle"></i> {{capButton}}</a>
  </div>
  <div class="row" id='divLevelUser'>
    <table id='tblKartuLaundry' class='table'>
      <thead>
        <tr>
          <td>Kd Kartu</td>
          <td>Pelanggan</td>
          <td>Status</td>
          <td>Masuk - Selesai</td>
          <td>Total Harga</td>
          <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['kartuLaundry'] as $kartu) :
          $pelanggan = $kartu['pelanggan'];
          $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$pelanggan';");
          $namaPelanggan =  $this -> st -> querySingle(); 
          $statusCuci = $kartu['status'];
          if($statusCuci == 'cuci'){
            $capStat = 'Laundry room';
          }else{
            $capStat = 'Selesai';
          }
        ?>
          <tr>
            <td><?=$kartu['kode_service']; ?></td>
            <td><?= $namaPelanggan['nama_lengkap']; ?></td>
            <td><?=$capStat; ?></td>
            <td><?= $kartu['waktu_mulai']; ?></td>
            <td></td>
            <td><button class="btn btn-sm btn-primary">Detail</button></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/kartuLaundry.js"></script>