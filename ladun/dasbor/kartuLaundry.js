$(document).ready(function(){
  $('#tblKartuLaundry').DataTable({"order": [[ 3, "desc" ]]});
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
    laundryRoomAtc : function(kdService){
      divJudul.judulForm = "Detail Cucian"+kdService;
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('laundryRoom/detailCucian',{'kd':kdService});
    }
  }
});