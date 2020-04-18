<?php
$this -> st -> query("SELECT username, nama_lengkap, email FROM tbl_pelanggan ORDER BY id DESC;");
$pelanggan = $this -> st -> queryAll();
?>
<div id='divFormRegistrasiCucian'>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
          <label>Kode Registrasi</label>
          <h3 id='txtKode'><?=$data['kodeRegistrasi']; ?></h3>
    </div>
    <div class="form-group">
          <label>Pelanggan</label>
          <select class="js-example-basic-single form-control" id='txtPelanggan'>
            <option value="none" default>-- Pilih pelanggan --</option>
           <?php
            foreach($pelanggan as $pel):
           ?>
        <option value="<?=$pel['username'];?>"><?=$pel['nama_lengkap'];?> - <?=$pel['email'];?></option>
        <?php endforeach; ?>
           </select>
    </div>
    <div class="form-group">
        <a href='#!' v-on:click='simpanRegistrasi' id='btnDaftarkan' class='btn btn-lg btn-primary'>Daftarkan Cucian</a>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
         <label>Waktu Masuk</label>
          <h3><?=$data['waktuMasuk']; ?></h3>
    </div>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/formRegistrasiCucian.js"></script>
