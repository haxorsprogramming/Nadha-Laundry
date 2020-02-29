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
      <input type="text" class="form-control" v-model='namaPelanggan' id='txtNama'>
</div>
