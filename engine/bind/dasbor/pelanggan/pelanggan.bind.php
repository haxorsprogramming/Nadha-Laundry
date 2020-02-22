<?php

?>
<div class='container'>
<div style='margin-bottom:15px;'>
<a href='#!' class='btn btn-lg btn-primary'>Tambah Pelangan</a>
</div>
<div class="row">
<table id='tblPelanggan' class='table'>
<thead>
<tr>
<td>Pelanggan</td><td>Sedang Laundry</td><td>Point</td><td>Grade</td><td>Aksi</td>
</tr>
</thead>
<tbody>
<?php
foreach($data['pelanggan'] as $pelanggan) : 
?>
<tr>
<td><?=$pelanggan['nama_lengkap']; ?></td>
<td>Sedang Laundry</td>
<td>Point</td>
<td>Grade</td>
<td><a href='#!' class='btn btn-sm btn-warning'>Detail</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pelanggan.js"></script>