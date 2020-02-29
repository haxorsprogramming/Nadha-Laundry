// const usernameHidden = document.getElementById('txtUsernameHidden').value;

var divProfilePelanggan = new Vue({
  el : '#divProfilePelanggan',
  data : {
    usernameHidden : document.getElementById('txtUsernameHidden').value,
  },
  methods : {
    editProfileAtc : function(){
      window.alert(this.usernameHidden);
      $('#frmEditProfilePelanggan').load('pelanggan/formEditProfilePelanggan');
    }
  }
});
