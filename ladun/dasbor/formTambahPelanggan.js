$(document).ready(function(){
  document.getElementById('txtUsername').focus();
});

var divFormTambahPelanggan = new Vue({
  el : '#divFormTambahPelanggan',
  data : {
    username : '',
    namaLengkap : '',
    alamat : '',
    nomorHandphone : '',
    email : '',
    levelUser : ''
  },
  methods : {
    simpan : function(){
      
    }
  }
});
