$(document).ready(function(){
  $('#tblKartuLaundry').DataTable();
});

var divKartuLaundry = new Vue({
  el : '#divKartuLaundry',
  data : {
    capButton : 'Registrasi Cucian Pelanggan'
  },
  methods: {
    tambahPelanggan : function(){
      divJudul.judulForm = "Registrasi Cucian Baru";
      renderMenu('kartuLaundry/formRegistrasiCucian');
    }
  }
});