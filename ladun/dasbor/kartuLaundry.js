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
    },
    detailAtc : function(kdService){
      divJudul.judulForm = "Detail kartu laundry";
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('kartuLaundry/detailKartuLaundry/'+kdService);
    },
    pickUpAtc : function(kdService){
      window.alert(kdService);
    },
    bayarAtc : function(kdService){
      if(kdService === 'no'){
        window.alert("Belum bisa melakukan pembayaran!!");
      }else{

      }
    }
  }
});