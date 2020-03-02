var divFormUpdateProfilePelanggan = new Vue({
  el: '#divFormUpdateProfilePelanggan',
  data: {},
  methods: {
    prosesUpdateProfile: function() {
      let username = document.getElementById('txtUsername').value;
      let namaLengkap = document.getElementById('txtNama').value;
      let alamat = document.getElementById('txtAlamat').value;
      let hp = document.getElementById('txtHp').value;
      let email = document.getElementById('txtEmail').value;
      let levelUser = document.getElementById('txtLevelUser').value;
      // $data['username'] = $this -> inp('username');
      // $data['namaLengkap'] = $this -> inp('namaLengkap');
      // $data['alamat'] = $this -> inp('alamat');
      // $data['nomorHandphone'] = $this -> inp('nomorHandphone');
      // $data['email'] = $this -> inp('email');
      // $data['levelUser'] = $this -> inp('levelUser');
      $.post('pelanggan/proEditProfilePelanggan', {
        'username': username,
        'namaLengkap': namaLengkap,
        'alamat': alamat,
        'nomorHandphone':hp,
        'email': email,
        'levelUser': levelUser
      }, function(data) {
        console.log(data);
      });
    }
  }
});
