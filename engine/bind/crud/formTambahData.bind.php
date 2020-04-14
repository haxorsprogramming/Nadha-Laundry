<script>
$(document).ready(function(){

$('#btnSimpan').click(function(){
var nim = $('#txtNim').val();
var nama = $('#txtNama').val();
var email = $('#txtEmail').val();
var alamat = $('#txtAlamat').val();
var jurusan = $('#txtJurusan').val();

if(!nim || !nama || !email || !alamat || !jurusan){
window.alert("Harus terisi semua");
}else{
$.post('crud/proTambahData',{'nim':nim,'nama':nama,'email':email,'alamat':alamat,'jurusan':jurusan},function(data){
   window.alert("Data sukses di tambahkan");
   $.post('crud/tampilMahasiswa',{},function(data){
          $('#divTampilMahasiswa').html(data);
    });
});
}

});

$('#btnKembali').click(function(){
$.post('crud/tampilMahasiswa',{},function(data){
          $('#divTampilMahasiswa').html(data);
        });
});

});
</script>

<div>
<table>
<tr>
<td>Nim</td><td><input type='text' class='form-control' id='txtNim' /></td>
</tr>
<tr>
<td>Nama</td><td><input type='text' class='form-control' id='txtNama' /></td>
</tr>
<tr>
<td>Email</td><td><input type='text' class='form-control' id='txtEmail' /></td>
</tr>
<tr>
<td>Alamat</td><td><input type='text' class='form-control' id='txtAlamat' /></td>
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
<td style='padding-top:12px;'><button class='btn btn-primary' id='btnSimpan'>Simpan</button></td>
</tr>
</table>
<br/>
<a href='#!' id='btnKembali'>Kembali</a>
</div>
