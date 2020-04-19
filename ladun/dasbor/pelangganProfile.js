var divProfilePelanggan = new Vue({
  el: '#divProfilePelanggan',
  data: {
    kdService : 'sukses'
  },
  methods: {
    editProfileAtc: function(username) {
      $('#frmEditProfilePelanggan').load('pelanggan/formEditProfilePelanggan', {'username': username});
      $('.btnEditProfilePelanggan').hide();
    },
    updateDetailDipilih : function(kdService){
      divJudul.judulForm = "Detail kartu laundry";
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('kartuLaundry/detailKartuLaundry/'+kdService);
    },
    historyCucianPelanggan : function(username){
      divJudul.judulForm = "History cucian pelanggan";
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('pelanggan/historyCucianPelanggan/'+username);
    }
  }
});
