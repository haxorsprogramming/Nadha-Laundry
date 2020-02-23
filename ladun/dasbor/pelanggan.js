const dasbor = 'beranda/dasbor';

$('#tblPelanggan').DataTable();

var divOperasi = new Vue({
  el : '#divOperasi',
  methods : {
    tambahPelanggan : function(){
      divJudul.judulForm = "Tambah pelanggan";
    }
  }
});

var divTabelPelanggan = new Vue({
  el : '#divTabelPelanggan',
  methods : {

  }
});

$('.btnDetail').click(function(){
  let username = $(this).attr('id');

});
