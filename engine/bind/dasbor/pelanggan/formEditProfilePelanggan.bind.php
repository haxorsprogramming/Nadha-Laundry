<?php
$usernameParam = $data['username'];
$this -> st -> query("SELECT * FROM tbl_pelanggan WHERE username='$usernameParam' LIMIT 0,1;");
$pelanggan = $this -> st -> querySingle();

?>
<div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control form-disabled" value="<?=$pelanggan['username']; ?>" v-model='username' id='txtUsername'>
</div>
<div class="form-group">
      <label>Nama Pelanggan</label>
      <input type="text" class="form-control" v-model='namaPelanggan' value="<?=$pelanggan['nama_lengkap']; ?>" id='txtNama'>
</div>
<div class="form-group">
      <label>Alamat</label>
      <input type="text" class="form-control" v-model='alamat' value="<?=$pelanggan['alamat']; ?>" id='txtAlamat'>
</div>
<div class="form-group">
      <label>Hp</label>
      <input type="text" class="form-control" v-model='hp' value="<?=$pelanggan['hp']; ?>" id='txtHp'>
</div>
<div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" v-model='email' value="<?=$pelanggan['email']; ?>" id='txtEmail'>
</div>
