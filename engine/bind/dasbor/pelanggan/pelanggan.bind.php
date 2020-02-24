<?php

?>
<div class='container'>
<div style='margin-bottom:15px;' id='divOperasi'>
<a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPelanggan'><i class="fas fa-plus-circle"></i> Tambah Pelangan</a>
</div>
<div class="row" id='divTabelPelanggan'>
<table id='tblPelanggan' class='table'>
<thead>
  <tr>
  <th>Pelanggan</th><th>Sedang Laundry</th><th>Point</th><th>Level User</th><th>Aksi</th>
  </tr>
</thead>
<tbody>
<?php
foreach($data['pelanggan'] as $pelanggan) :
?>
<tr>
<td style='font-size:16px;'><?=$pelanggan['nama_lengkap']; ?><br/>
<b><?=$pelanggan['username']; ?></b>
</td>
<td></td>
<td></td>
<td><?=$pelanggan['level']; ?></td>
<td><a href='#!' class='btn btn-sm btn-warning btnDetail' id='<?=$pelanggan['username'];?>'>Detail</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pelanggan.js"></script>
