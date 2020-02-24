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
<td>
 <li class="media">
      <img class="mr-3 rounded-circle" width="50" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" alt="avatar">
        <div class="media-body">
          <div class="media-title"><a href='#!'><?=$pelanggan['nama_lengkap']; ?><a/></div>
        <b><?=$pelanggan['username']; ?></b><br/>
        </div>
 </li>
</td>
<td></td>
<td><?=$pelanggan['point_real']; ?></td>
<td><?=$pelanggan['level']; ?></td>
<td><a href='#!' class='btn btn-sm btn-warning btnDetail' id='<?=$pelanggan['username'];?>'>Detail</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pelanggan.js"></script>
