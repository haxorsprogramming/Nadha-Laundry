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
      window.alert(kdService);
      document.getElementById('txtKode').innerHTML = kdService;
    }
  }
});


 $(".modal-1").fireModal({
  body: $("#modal-login-part"),
  title: ":("
 });