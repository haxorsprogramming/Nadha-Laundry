var divFormUpdateProfilePelanggan = new Vue({
  el : '#divFormUpdateProfilePelanggan',
  data : {
    username : document.getElementById('txtUsername').value,
    namaLengkap : document.getElementById('txtNama').value,
    alamat : document.getElementById('txtAlamat').value,
    hp : document.getElementById('txtHp').value,
    email : document.getElementById('txtEmail').value,
    levelUser : document.getElementById('txtLevelUser').value
  },
  methods : {
    prosesUpdateProfile : function(){
      console.log(this.username+this.namaLengkap+this.alamat+this.hp+this.email);
      
    }
  }
});
