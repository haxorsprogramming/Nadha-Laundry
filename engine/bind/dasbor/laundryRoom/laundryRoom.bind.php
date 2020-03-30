<div class="container" id='divLaundryRoom'>
  <div style='margin-bottom:15px;'>
  </div>
  <div class="row">
  <table id='tblLaundryRoom' class='table'>
      <thead>
        <tr>
          <td>Kode Registrasi</td>
          <td>Pelanggan</td>
          <td>Waktu Masuk</td>
          <td>Total Item</td>
          <td>Total Harga</td>
          <td>Status</td>
          <td>Aksi</td>
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
                $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$pelanggan' LIMIT 0,1;");
                $qNamaPelanggan = $this -> st -> querySingle();
                $namaPelanggan = $qNamaPelanggan['nama_lengkap'];
          ?>
        <tr>
          <td><a href='#!' v-on:click='detailsAtc("<?=$kdKartu; ?>")'><span style="font-size:22px;"><?=$lr['kd_kartu']; ?></span></a></td>
          <td><?=$namaPelanggan; ?></td>
          <td><?=$waktuMasuk; ?></td>
          <td><?=$lr['total_item']; ?></td>
          <td><?="Rp. ".number_format($lr['total_harga']); ?></td>
          <td><?=$lr['status']; ?></td>
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