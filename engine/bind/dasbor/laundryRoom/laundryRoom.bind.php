<div id='divLaundryRoom'>
  <div style='margin-bottom:15px;'>
  </div>
  <div class="row">
  <table id='tblLaundryRoom' class='table table-hover'>
      <thead>
        <tr>
        <th>Kode Registrasi</th>
          <th>Pelanggan</th>
          <th>Waktu Masuk</th>
          <th>Total Item</th>
          <th>Total Harga</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach($data['laundryRoom'] as $lr):
                $kdKartu = $lr['kd_kartu'];
                $this -> st -> query("SELECT pelanggan, waktu_masuk FROM tbl_kartu_laundry WHERE kode_service='$kdKartu' LIMIT 0,1;");
                $qKodePelanggan =  $this -> st -> querySingle(); 
                $pelanggan = $qKodePelanggan['pelanggan'];
                $waktuMasuk = $qKodePelanggan['waktu_masuk'];
                $this -> st -> query("SELECT nama_lengkap, level FROM tbl_pelanggan WHERE username='$pelanggan' LIMIT 0,1;");
                $qNamaPelanggan = $this -> st -> querySingle();
                $namaPelanggan = $qNamaPelanggan['nama_lengkap'];
                $levelUser = $qNamaPelanggan['level'];

                if($lr['status'] == 'cuci'){
                  $capStat =  "Sedang cuci";
                  $warnaTabel = '#2ecc71';
                }else{
                  $capStat =  "Ready";
                  $warnaTabel = '#f1c40f';
                }
                //cari total harga 
                $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kdKartu';");
                $jlhItem = $this -> st -> numRow();
                $qTotal = $this -> st -> queryAll();
                $hargaAwal = 0;
                foreach($qTotal as $qt){
                  $hargaSat = $qt['total'];
                  $hargaAwal = $hargaAwal + $hargaSat;
                }
          ?>
        <tr>
          <td><a href='#!' v-on:click='detailsAtc("<?=$kdKartu; ?>")'><span style="font-size:18px;"><?=$lr['kd_kartu']; ?></span></a></td>
          <td><span style="font-size: 16px;font-weight:bold;"><?=$namaPelanggan; ?></span>
          <br/><?=$levelUser; ?>
          </td>
          <td><?=$waktuMasuk; ?></td>
          <td><?=$jlhItem; ?></td>
          <td>Rp. <?=number_format($hargaAwal); ?></td>
          <td style='background-color:<?=$warnaTabel; ?>;'><?=$capStat; ?></td>
          <td>
              <a href='#!' class="btn btn-sm btn-info" v-on:click='detailsAtc("<?=$kdKartu; ?>")'><i class='fas fa-exclamation-circle'></i> Details</a>&nbsp;&nbsp;
              <a href='#!' class="btn btn-sm btn-primary" v-on:click='detailsAtc("<?=$kdKartu; ?>")'><i class="fas fa-check-circle"></i> Selesai Cuci</a>
          </td>
        </tr>
         <?php endforeach; ?>   
      </tbody>
  </table>
  <hr/>
  <div>
      Keterangan : 
      <ul>
          <li v-for='lk in listKet'>{{lk.teks}}</li>
      </ul>
  </div>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/laundryRoom.js"></script>