$('#tblPelanggan').DataTable();

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

  }
});

$('#tblPelanggan').on('click','.btnDetail',function(){
  let username = $(this).attr('id');
  window.alert(username);
});
