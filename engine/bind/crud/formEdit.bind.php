<script type="text/javascript">
	var except = "Data";
	$(document).ready(function(){
		$('#btnKembali').click(function(){
		$.post('crud/tampilMahasiswa',{},function(data){
          $('#divTampilMahasiswa').html(data);
        	});
		});

		$('#btnUpdate').click(function(){
			var nim = $('#txtNim').val();
			var nama = $('#txtNama').val();
			var email = $('#txtEmail').val();
			var alamat = $('#txtAlamat').val();
			var jurusan = $('#txtJurusan').val();

			$.post('crud/proUpdateData',{'nim':nim,'nama':nama,'email':email,'alamat':alamat,'jurusan':jurusan},function(data){
				$('#divTampilMahasiswa').load('crud/tampilMahasiswa');
			});
		});

		$('#btnDelete').click(function(){
			var nim = $('#txtNim').val();
			var pesan = confirm("Hapus data?");
			if(pesan===true){
				$.post('crud/proDeleteData',{'nim':nim},function(){
					$('#divTampilMahasiswa').load('crud/tampilMahasiswa');
				});
			}else{

			}
		});


	});
</script>
<div>
<table>
<tr>
<td>Nim</td><td><input type='text' class='form-control' id='txtNim' value="<?=$data['mhsDetail']['nim']; ?>" readonly/></td>
</tr>
<tr>
<td>Nama</td><td><input type='text' class='form-control' id='txtNama' value="<?=$data['mhsDetail']['nama']; ?>"/></td>
</tr>
<tr>
<td>Email</td><td><input type='text' class='form-control' id='txtEmail' value="<?=$data['mhsDetail']['email']; ?>"/></td>
</tr>
<tr>
<td>Alamat</td><td><input type='text' class='form-control' id='txtAlamat' value="<?=$data['mhsDetail']['alamat']; ?>"/></td>
</tr>
<tr>
<td>Jurusan:</td><td>
<select class='form-control' id='txtJurusan'>
<option value='Ilmu Komputer'>Ilmu Komputer</option>
<option value='Sistem Informasi'>Sistem Informasi</option>
<option value='Matematika'>Matematika</option>
<option value='Biologi'>Biologi</option>
<option value='Fisika'>Fisika</option>
</select>
</td>
</tr>
<tr>
<td style='padding-top:12px;'><button class='btn btn-primary' id='btnUpdate'>Update</button>
<button class='btn btn-warning' id='btnDelete'>Delete</button></td>
</tr>
</table>
<br/>
<a href='#!' id='btnKembali'>Kembali</a>
</div>
