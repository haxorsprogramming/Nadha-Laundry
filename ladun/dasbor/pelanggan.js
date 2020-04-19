$(document).ready(function(){
  $('#tblPelanggan').DataTable();
});

var divOperasi = new Vue({
  el : '#divOperasi',
  methods : {
    tambahPelanggan : function(){
      divJudul.judulForm = "Tambah pelanggan";
      renderMenu('pelanggan/formTambahPelanggan');
    }
  }
});

var divTabelPelanggan = new Vue({
  el : '#divTabelPelanggan',
  methods : {
    pelangganProfile : function(username){
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('pelanggan/pelangganProfile',{'username':username});
  }
  }
});

$('#tblPelanggan').on('click','.btnDetail',function(){
  let username = $(this).attr('id');
  divJudul.judulForm = "Detail Pelanggan";
  $('#divUtama').html("Memuat ...");
  $('#divUtama').load('pelanggan/pelangganProfile',{'username':username});
});
