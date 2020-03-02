<?php
$usernameParam = $data['username'];
$this -> st -> query("SELECT * FROM tbl_pelanggan WHERE username='$usernameParam' LIMIT 0,1;");
$pelanggan = $this -> st -> querySingle();

?>
<div class='row'>
<div class="col-lg-6 col-md-6 col-12">
  <div class="card profile-widget" id='divProfilePelanggan'>
                    <div class="profile-widget-header">
                      <img alt="image" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" class="rounded-circle profile-widget-picture">
                      <div class="profile-widget-items">
                        <div class="profile-widget-item">
                          <div class="profile-widget-item-label">Point</div>
                          <div class="profile-widget-item-value">187</div>
                        </div>
                        <div class="profile-widget-item">
                          <div class="profile-widget-item-label">Grade</div>
                          <div class="profile-widget-item-value">6,8K</div>
                        </div>
                        <div class="profile-widget-item">
                          <div class="profile-widget-item-label">Total Laundry</div>
                          <div class="profile-widget-item-value">2,1K</div>
                        </div>
                      </div>
                    </div>
                    <div class="profile-widget-description">
                      <div class="profile-widget-name"><?=$pelanggan['nama_lengkap']; ?>
                        <div class="text-muted d-inline font-weight-normal">
                          <div class="slash"></div> <?=$data['username']; ?></div></div>
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
                          <td>tanggal_join</td>
                        </tr>
                        <tr>
                          <td>Terakhir Laundry</td>
                          <td>terakhir_laundry</td>
                        </tr>
                      </table>
                    </div>
                    </div>
                    <input style="display:none;" type="text" value="<?=$data['username']; ?>" id='txtUsernameHidden'>
                    <div class="card-footer text-center">
                      <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" v-on:click='editProfileAtc' id='btnEditProfile'><i class='fas fa-tools'></i> Edit profile pelanggan</a>
                    </div>
                  </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/profilePelanggan.js"></script>
