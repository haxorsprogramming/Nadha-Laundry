<?php
$detailKartu = $data['detailKartu'];
$kodeService = $detailKartu['kode_service'];
$waktuRegistrasi = $detailKartu['waktu_masuk'];
$waktuDiambil = $detailKartu['waktu_diambil'];
$username = $detailKartu['pelanggan'];
$statusCucian = $detailKartu['status'];
$pembayaran = $detailKartu['pembayaran'];
$dataTimeline = $data['dataTimeline'];
$adit = 'hula';
//cari nama pelanggan 
$this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$username';");
$qNamaPelanggan = $this -> st -> querySingle();
$namaPelanggan = $qNamaPelanggan['nama_lengkap'];
$this -> st -> query("SELECT id FROM tbl_timeline WHERE kd_service='$kodeService' AND kd_event='pick_up';");
$jlhPick = $this -> st -> numRow();
if($statusCucian == 'hold'){
  $capStatusCucian = 'Hold (Sedang dalam antrian ke laundry room)';
  $btnBayar = 'disabled';
  $btnSudahDiambil = 'disabled';
  $btnKeLaundryRoom = '';
}elseif($statusCucian == 'cuci' and $pembayaran == 'pending'){
  $capStatusCucian = 'Sedang cuci (Cucian sedang di ke laundry room)';
  $statusPembayaran = 'Belum';
  $statusDiambil = 'Belum';
  $btnBayar = '';
  $btnSudahDiambil = 'disabled';
  $btnKeLaundryRoom = '';
}elseif($statusCucian == 'cuci' and $pembayaran == 'selesai'){
  $capStatusCucian = 'Sedang cuci (Cucian sedang di ke laundry room)';
  $statusPembayaran = 'Sudah';
  $statusDiambil = 'Belum';
  $btnBayar = 'disabled';
  $btnSudahDiambil = 'disabled';
  $btnKeLaundryRoom = '';
}elseif($statusCucian == 'finishcuci' and $pembayaran == 'pending'){
  $capStatusCucian = 'Selesai (Cucian sudah selesai)';
  $statusPembayaran = 'Belum';
  $statusDiambil = 'Belum';
  $btnBayar = '';
  $btnSudahDiambil = 'disabled';
  $btnKeLaundryRoom = 'disabled';
}elseif($statusCucian == 'finishcuci' and $pembayaran == 'selesai' and $jlhPick == '0'){
  $capStatusCucian = 'Selesai (Cucian sudah selesai)';
  $statusPembayaran = 'Sudah';
  $statusDiambil = 'Belum';
  $btnBayar = 'disabled';
  $btnSudahDiambil = '';
  $btnKeLaundryRoom = 'disabled';
}elseif($statusCucian == 'finishcuci' and $pembayaran == 'selesai' and $jlhPick == '1'){
  $capStatusCucian = 'Selesai & Diambil (Cucian sudah selesai dan diambil oleh pelanggan)';
  $statusPembayaran = 'Sudah';
  $statusDiambil = 'Sudah';
  $btnBayar = 'disabled';
  $btnSudahDiambil = 'disabled';
  $btnKeLaundryRoom = 'disabled';
}


?>
<div id='divDetailKartuLaundry'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
        <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Kartu laundry <?=$kodeService; ?></h5></div>
        <div style="padding-top:12px;padding-left:10px;">
        <table class="table">
            <tr>
                <td>Pelanggan</td>
                <td><?=$namaPelanggan; ?></td>
            </tr>
            <tr>
                <td>Waktu Registrasi</td>
                <td><?=$waktuRegistrasi; ?></td>
            </tr>
            <tr>
                <td>Status Cucian</td>
                <td><?=$capStatusCucian; ?></td>
            </tr>
            <tr>
                <td>Status Pembayaran</td>
                <td><?=$statusPembayaran; ?></td>
            </tr>
            <tr>
                <td>Sudah di ambil</td>
                <td><?=$statusDiambil; ?></td>
            </tr>
        </table>
        <div style="text-align: center;padding-top:12px;">
            <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left <?=$btnBayar; ?>" v-on:click='bayarAtc("<?=$kodeService; ?>")'><i class='fas fa-receipt'></i> Bayar</a>&nbsp;&nbsp;
            <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left <?=$btnSudahDiambil; ?>" v-on:click='pickUpAtc("<?=$kodeService; ?>")' id='btnPickUp'><i class='fas fa-check-circle'></i> Set sudah di ambil</a>&nbsp;&nbsp;
            <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left <?=$btnKeLaundryRoom; ?>" v-on:click='keLaundryRoomAtc("<?=$kodeService; ?>")'><i class='fas fa-tshirt'></i> Ke laundry room</a>&nbsp;&nbsp;
        </div>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
        <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Timeline cucian</h5></div>
        <div class="card-body">
        <div class="activities">
                <?php 
                  foreach($dataTimeline as $dT): 
                    $waktu = $dT['waktu'];
                    $caption = $dT['caption'];
                    $kdEvent = $dT['kd_event'];
                    //set icon 
                    if($kdEvent == 'registrasi_cucian'){
                      $iconTm = 'fas fa-clipboard-check';
                    }elseif($kdEvent == 'mulai_cuci'){
                      $iconTm = 'fas fa-tshirt';
                    }elseif($kdEvent == 'pembayaran_selesai'){
                      $iconTm = 'fas fa-receipt';
                    }elseif($kdEvent == 'cucian_selesai'){
                      $iconTm = 'fas fa-check-circle';
                    }else{
                      $iconTm = 'fas fa-shipping-fast';
                    }
                ?>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="<?=$iconTm; ?>"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job"><?=$waktu; ?></span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#!">Admin</a>
                      </div>
                      <p><?=$caption; ?></p>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
        </div>
        </div>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/detailKartuLaundry.js"></script>