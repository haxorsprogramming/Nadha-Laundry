<!-- tambah verifikasi cek ke session terlebih dahulu -->

<div id='divKartuLaundry'>
  <div style='margin-bottom:25px;' id='divOperasi'>
    <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPelanggan'>
    <i class="fas fa-plus-circle"></i> {{capButton}}</a>
  </div>
  <div  id='divLevelUser'>
    <table id='tblKartuLaundry' class='table table-hover'>
      <thead>
      <tr>
          <th>Kd Kartu</th>
          <th>Pelanggan</th>
          <th>Status</th>
          <th>Waktu</th>
          <th>Total Harga</th>
          <th>Status Pembayaran & Pick Up</th>
          <th></th>
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
          $waktuDiambil = $kartu['waktu_diambil'];
          if($statusCuci === 'cuci'){
            $capStat = 'Laundry Room';
            $colSc = 'info';
            $colBgSc = '#3abaf4';
            $icon = 'fas fa-tshirt';
            $sCapBayar = $kodeService;
          }else if($statusCuci === 'hold'){
            $capStat = 'Hold';
            $colSc = 'secondary';
            $icon = 'fas fa-upload';
            $colBgSc = '#34395e';
            $sCapBayar = 'no';
          }else if($statusCuci === 'finishcuci'){
            $capStat = 'Selesai Cuci';
            $colSc = 'success';
            $colBgSc = '#63ed7a';
            $icon = 'fas fa-check-circle';
            $sCapBayar = $kodeService;
          }
          //cari total harga 
          //cari total harga 
          $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kodeService';");
          $jlhItem = $this -> st -> numRow();
          $qTotal = $this -> st -> queryAll();
          $hargaAwal = 0;
          foreach($qTotal as $qt){
            $hargaSat = $qt['total'];
            $hargaAwal = $hargaAwal + $hargaSat;
          }
          //cari status pembayaran 
          $statPay = $kartu['pembayaran'];
          if($statPay == 'pending'){
            $capSt = "Belum bayar";
            $colSb = 'warning';
          }else{
            $capSt = "Sudah bayar";
            $colSb = 'success';
          }

          if($waktuDiambil == '0000-00-00 00:00:00'){
            $capStDiambil = 'Belum diambil';
            $bgStatPi = 'warning';
          }else{
            $capStDiambil = 'Sudah diambil';
            $bgStatPi = 'success';
          }
        ?>
          <tr>
            <td><a href='#!' v-on:click='detailAtc("<?=$kodeService; ?>")' style="font-size: 18px;"><?=$kodeService; ?><a/></td>
            <td><?= $namaPelanggan['nama_lengkap']; ?></td>
            <td style="background-color: <?=$colBgSc; ?>;">
            <a href="#!" class="badge badge-<?=$colSc; ?>"><i class="<?=$icon; ?>"></i> <?=$capStat; ?></a>
            </td>
            <td>Masuk : <b><?= $kartu['waktu_masuk']; ?></b><br/>
            Selesai : <b><?=$kartu['waktu_selesai']; ?></b><br/>
            Diambil : <b><?=$kartu['waktu_diambil']; ?></b></b>
            </td>
            <td>Rp. <?=number_format($hargaAwal ); ?></td>
            <td> <span class="badge badge-<?=$colSb; ?>"><i class="fas fa-circle"></i> <?=$capSt; ?></span><br/><br/>
            <span class="badge badge-<?=$bgStatPi; ?>"><i class="fas fa-circle"></i> <?=$capStDiambil; ?></span>
          
          </td>
            <td>
            <div class="dropdown d-inline">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-bars'></i> Aksi
                      </button>
                      <div class="dropdown-menu" x-placement="bottom-start" style="border:1px solid grey;position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="#!" v-on:click='detailAtc("<?=$kodeService; ?>")'><i class="fas fa-info-circle"></i> Detail</a>
                        <?php
                        if($statusCuci === 'finishcuci'){
                        }else{
                          echo "<a class='dropdown-item has-icon' href='#!' v-on:click='laundryRoomAtc(\"$kodeService\")'><i class='fas fa-tshirt'></i> Ke laundry room</a>";
                        }
                        ?>
                      </div>
                    </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <hr/>
  <div>
  Keterangan status kartu <br/>
  <ul>
  <li><span class="badge badge-secondary">Hold</span> : Kartu laundry sudah dibuat, pelanggan belum membuat daftar cucian, cucian dapat ditambahkan di menu laundry room</li>
  <li><span class="badge badge-info">Laundry Room</span> : Kartu laundry sudah memiliki antrian di laundry yang memiliki minimal 1 cucian, cucian dapat ditambahkan di menu laundry room</li>
  <li><span class="badge badge-success">Selesai</span> : Cucian telah selesai</li>
  <li><span class="badge badge-primary">Diambil</span> : Cucian telah di ambil/diantarkan</li>
  </ul>
  <hr/>
  Catatan tambahan <br/>
  <ul>
    <li>Untuk pembayaran, pengambilan, serta pembatalan cucian dapat dilakukan dengan mengklik "Aksi" atau klik kode kartu dari cucian</li>
  </ul>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/kartuLaundry.js"></script>