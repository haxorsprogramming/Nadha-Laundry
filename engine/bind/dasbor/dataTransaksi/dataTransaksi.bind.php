<div class="container" id='divDataTransaksi'>
  <div style='margin-bottom:15px;'>
  </div>
  <div class="row">
  <table id='tblDataTransaksi' class='table table-hover'>
      <thead>
        <tr>
          <th>Kode Invoice</th>
          <th>Pelanggan</th>
          <th>Waktu</th>
          <th>Total Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach($data['dataTransaksi'] as $dt):
                $kdTransaksi = $dt['kd_pembayaran'];
                $kdService = $dt['kd_kartu'];
                $waktu = $dt['waktu'];
                $totalHarga = $dt['total_final'];
                //cari nama pelanggan
                $this -> st -> query("SELECT pelanggan FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
                $qUsernamePelanggan = $this -> st -> querySingle();
                $username = $qUsernamePelanggan['pelanggan'];
                $this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$username';");
                $qNamaPelanggan = $this -> st -> querySingle();
                $namaPelanggan = $qNamaPelanggan['nama_lengkap'];
          ?>
        <tr>
          <td><a href='#!' v-on:click='detailTransaksiAtc("<?=$kdTransaksi; ?>")'><?=$kdTransaksi; ?></a></td>
          <td><?=$namaPelanggan; ?></td>
          <td><?=$waktu; ?></td>
          <td>Rp. <?=number_format($totalHarga); ?></td>
          <td><a href='#!' class="btn btn-sm btn-icon icon-left btn-primary"><i class='fas fa-print'></i> Cetak</a></td>
        </tr>
<?php endforeach; ?>   
      </tbody>
  </table>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/dataTransaksi.js"></script>