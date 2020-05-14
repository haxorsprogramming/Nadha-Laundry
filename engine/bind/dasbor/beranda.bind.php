<?php
$rankPelanggan = $data['qRankPelanggan'];
//buat range tanggal 
$waktuNow = date('Y-m-d');
$mingguDepan = date('Y-m-d', strtotime($waktuNow. ' - 7 days'));
$rentangSeminggu = $this -> jarakTanggal($mingguDepan, $waktuNow);
$dibalik = array_reverse($rentangSeminggu);
?>
<div id='divBeranda'>
<div>
<!-- Statistik Bar -->
<div class='row'>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="fas fa-water"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
      <h3 id='capTotalUji'>{{jlhCucian}}</h3>
            <h4>Cucian</h4>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
          <h3 id='capTotalGejala'>{{jlhPelanggan}}</h3>
            <h4>Pelanggan</h4>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="	fas fa-chart-line"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
        <h3 id='capTotalGejala'>70%</h3>
            <h4>Profit Bulanan</h4>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="fas fa-donate"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
          <h3 id='capTotalUji'><?=$data['jlhTransaksiHarian']; ?></h3>
            <h4>Transaksi Harian</h4>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- Card layanan / service terlaris  -->
  <div class='row'>
  <div class="col-lg-6 col-md-6 col-12">
              <div class="card card-warning">
                <div class="card-header">
                  <h4>Rekap transksi laundry seminggu terakhir</h4>
                  <div class="card-header-action">
                    <a href="#!" class="btn btn-primary">Detail</a>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-hover table-bordered">
                      <tr>
                        <th>Tanggal</th><th>Transaksi</th><th>Nominal</th>
                      </tr>
                      <?php
                      //perulangan - kapan lah ini bisa di masukkan ke dalam model
                        for ($x = 0; $x < 7; $x++) {
                          $tanggalToExplode = $dibalik[$x];
                          $tglResultExplode = explode("/",$tanggalToExplode);
                          $tanggalFNow = $tglResultExplode[0]."-".$tglResultExplode[1]."-".$tglResultExplode[2];
                          $tglDayTambahSatu = $tglResultExplode[2] + 1;
                          $tanggalToExplodeFNext = $tglResultExplode[0]."-".$tglResultExplode[1]."-".$tglDayTambahSatu;
                          $tglStart = $tanggalFNow." 00:00:01";
                          $tglAkhir = $tanggalToExplodeFNext." 00:00:00";
                          $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE (waktu BETWEEN '$tglStart' AND '$tglAkhir');");
                          $totalTransaksi = $this -> st -> numRow();
                          //cari total transaksi 
                          $qTotal = $this -> st -> queryAll();
                          $total = 0;
                          foreach($qTotal as $crTotal){
                              $totalTemp = $crTotal['total_final'];
                              $total = $total + $totalTemp;
                          }
                          $capTotal = number_format($total);
                          echo "<tr><td>".$tanggalFNow."</td><td>".$totalTransaksi."</td><td> Rp. ".$capTotal."</td></tr>";
                        }
                      ?>
                  </table>
                </div>
              </div>
        </div>
        <!-- Pelanggan teraktif -->
        <div class="col-lg-6 col-md-6 col-12">
        <div class="card card-warning">
                <div class="card-header">
                  <h4 class="d-inline">Ranking Pelanggan</h4>
                  <div class="card-header-action">
                    <a href="#!" class="btn btn-primary">Semua</a>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    <?php 
                      foreach($rankPelanggan as $rp):
                        $username = $rp['username'];
                        $levelPelanggan = $rp['level'];
                        //cari total cuci pelanggan 
                        $this -> st -> query("SELECT id FROM tbl_kartu_laundry WHERE pelanggan='$username';");
                        $jlhTransaksi = $this -> st -> numRow();
                    ?>
                    <li class="media">
                      
                      <img class="mr-3 rounded-circle" width="50" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" alt="avatar">
                      <div class="media-body">
                        <div class="float-right"><?=$levelPelanggan; ?></div>
                        <h6 class="media-title"><a href="#!" v-on:click="pelangganProfile('<?=$username;?>')"><?=$rp['nama_lengkap']; ?></a></h6>
                        <div class="text-small text-muted"><?=$jlhTransaksi; ?> Total Cuci <div class="bullet"></div> <span class="text-primary"><?=$rp['poin_real'] ;?> Poin</span></div>
                      </div>
                    </li>
                      <?php endforeach; ?>
                  </ul>
                </div>
              </div>
        </div>
</div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/beranda.js"></script>
