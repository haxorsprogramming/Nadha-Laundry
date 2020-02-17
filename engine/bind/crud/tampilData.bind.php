<table class="table">
	<tr>
	<th>No</th>
	<th>Nim</th>
	<th>Nama</th>
	<th>Email</th>
	<th>Jurusan</th>
	<th>Alamat</th>
	</tr>

<?php
$no = 1;
foreach($data['mhs'] as $mhs) : ?>

<tr>
<td><?=$no; ?></td>
<td><?=$mhs['nim']; ?></td>
<td><a href='#!' id='<?=$mhs['nim']; ?>' class='dtlMhs'><?=$mhs['nama']; ?></a></td>
<td><?=$mhs['email']; ?></td>
<td><?=$mhs['jurusan']; ?></td>
<td><?=$mhs['alamat']; ?></td>

</tr>

<?php $no++;endforeach; ?>

</table>
<script>
$(document).ready(function(){
	$('.dtlMhs').click(function(){
		var nim = $(this).attr('id');
		$('#divTampilMahasiswa').load('crud/formEdit',{'nim':nim});
	});
});
</script>
