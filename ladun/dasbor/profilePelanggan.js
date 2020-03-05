// const usernameHidden = document.getElementById('txtUsernameHidden').value;

var divProfilePelanggan = new Vue({
  el: '#divProfilePelanggan',
  data: {
    usernameHidden: document.getElementById('txtUsernameHidden').value,
  },
  methods: {
    editProfileAtc: function() {
      $('#frmEditProfilePelanggan').load('pelanggan/formEditProfilePelanggan', {
        'username': this.usernameHidden
      });
      $('#btnEditProfile').hide();
    },
    updateProfilePelanggan: function() {
      window.alert("Howw");
    }
  }
});
