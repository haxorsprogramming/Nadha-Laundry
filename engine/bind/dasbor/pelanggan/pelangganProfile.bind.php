<?php
$usernameParam = $data['username'];
$historyCucian = $data['historyCucian'];
$this -> st -> query("SELECT * FROM tbl_pelanggan WHERE username='$usernameParam' LIMIT 0,1;");
$pelanggan = $this -> st -> querySingle();
$poin = $pelanggan['poin_real'];
$level = $pelanggan['level'];
$waktuJoin = $pelanggan['waktu_join'];
//total laundry 
$this -> st -> query("SELECT id FROM tbl_kartu_laundry WHERE pelanggan='$usernameParam';");
$jlhTransaksi = $this -> st -> numRow();
//cari terakhir laundry 
$this -> st -> query("SELECT waktu_masuk FROM tbl_kartu_laundry WHERE pelanggan='$usernameParam' ORDER BY waktu_masuk DESC;");
$qTerakhirLaundry = $this -> st -> querySingle();
$terakhirLaundry = $qTerakhirLaundry['waktu_masuk'];
if($terakhirLaundry == ''){
  $terakhirLaundry = "Belum pernah melakukan cucian";
}else{}
?>
<div class='row' id='divProfilePelanggan'>
<div class="col-lg-6 col-md-6 col-12">
  <div class="card profile-widget">
                    <div class="profile-widget-header">
                      <img alt="image" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" class="rounded-circle profile-widget-picture">
                      <div class="profile-widget-items">
                        <div class="profile-widget-item">
                          <div class="profile-widget-item-label">Poin</div>
                          <div class="profile-widget-item-value"><?=$poin; ?></div>
                        </div>
                        <div class="profile-widget-item">
                          <div class="profile-widget-item-label">Level</div>
                          <div class="profile-widget-item-value"><?=$level; ?></div>
                        </div>
                        <div class="profile-widget-item">
                          <div class="profile-widget-item-label">Total Laundry</div>
                          <div class="profile-widget-item-value"><?=$jlhTransaksi; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="profile-widget-description">
                      <div class="profile-widget-name"><?=$pelanggan['nama_lengkap']; ?>
                        <div class="text-muted d-inline font-weight-normal">
                          <div class="slash"></div><span id='txtUsername'><?=$data['username']; ?></span></div></div>
                          <div id='frmEditProfilePelanggan'>
                      <table class="table table-bordered">
                        <tr>
                          <td>Alamat</td>
                          <td><?=$pelanggan['alamat']; ?></td>
                        </tr>
                        <tr>
                          <td>Hp</td>
                          <td><?=$pelanggan['hp']; ?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><?=$pelanggan['email']; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Join</td>
                          <td><?=$waktuJoin; ?></td>
                        </tr>
                        <tr>
                          <td>Terakhir Laundry</td>
                          <td><?=$terakhirLaundry; ?></td>
                        </tr>
                      </table>
                    </div>
                    </div>
                    <div class="card-footer text-center">
                      <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" v-on:click='editProfileAtc("<?=$usernameParam; ?>")'><i class='fas fa-edit'></i> Edit profile pelanggan</a>
                    </div>
                  </div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="card card-warning">
  <div class="card-header">
  <h4 class="d-inline">History cucian pelanggan</h4>
      <div class="card-header-action">
      <a href='#!' class="btn btn-sm btn-primary" v-on:click='historyCucianPelanggan("<?=$usernameParam; ?>")'>Lihat semua</a>
      </div>
  </div>
  <div class="card-body">
  <table class="table table-bordered table-hover">
    <tr>
      <th>Kd Service - Invoice</th><th>Waktu</th><th>Total</th><th></th>
    </tr>
    <?php 
      foreach($historyCucian as $hc):
        $kodeService = $hc['kode_service'];
        $waktu = $hc['waktu_masuk'];
    ?>
    <tr>
      <td><?=$kodeService; ?></td><td><?=$waktu; ?></td><td></td>
      <td><a href='#!' class="btn btn-sm btn-info btn-icon icon-left" v-on:click='updateDetailDipilih("<?=$kodeService; ?>")'>
      <i class='fas fa-search'></i> Detail</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  </div>
</div>
</div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pelangganProfile.js"></script>
