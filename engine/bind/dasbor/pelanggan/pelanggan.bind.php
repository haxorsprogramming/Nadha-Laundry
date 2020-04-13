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
  //cari status cuci pelanggan 
  $username = $pelanggan['username'];
  $this -> st -> query("SELECT id FROM tbl_kartu_laundry WHERE pelanggan='$username' AND status='cuci';");
  $jlhStatusCuci = $this -> st -> numRow();
  if($jlhStatusCuci < 1){
    $statusCuci = "Tidak";
  }else{
    $statusCuci = "Ya";
  }
?>
<tr>
<td>
 <li class="media">
      <img class="mr-3 rounded-circle" width="50" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" alt="avatar">
        <div class="media-body">
          <div class="media-title"><a href='#!'><?=$pelanggan['nama_lengkap']; ?><a/></div>
        <b><?=$pelanggan['username']; ?></b><br/>
        <i><?=$pelanggan['email']; ?></i>
        </div>
 </li>
</td>
<td><?=$statusCuci; ?></td>
<td><?=$pelanggan['poin_real']; ?></td>
<td><?=$pelanggan['level']; ?></td>
<td><a href='#!' class='btn btn-sm btn-primary btn-icon icon-left btnDetail' id='<?=$pelanggan['username'];?>'><i class='fas fa-exclamation-circle'></i> Detail</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pelanggan.js"></script>
