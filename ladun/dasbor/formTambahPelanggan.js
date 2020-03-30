$(document).ready(function() {
  document.getElementById('txtUsername').focus();
});

var divFormTambahPelanggan = new Vue({
  el: '#divFormTambahPelanggan',
  data: {
    username: '',
    namaLengkap: '',
    alamat: '',
    nomorHandphone: '',
    email: '',
    levelUser: '',

  },
  methods: {
    simpan: function() {
      $('#btnSimpan').addClass('disabled');
      if (this.username === '' || this.namaLengkap === '' || this.alamat === '' || this.nomorHandphone === '' || this.email === '' || this.levelUser === '') {
        harapLengkapi();
      } else {
        $.post('pelanggan/proTambahPelanggan', {
          'username': this.username,
          'namaLengkap': this.namaLengkap,
          'alamat': this.alamat,
          'nomorHandphone': this.nomorHandphone,
          'email': this.email,
          'levelUser': this.levelUser
        }, function(data) {
          let obj = JSON.parse(data);
          if (obj.status === 'error') {
            errorSimpan();
          } else {
            suksesSimpan();
          }
        });
      }
    },
    clearForm : function(){
      this.username = '';
      this.namaLengkap = '';
      this.alamat = '';
      this.nomorHandphone = '';
      this.email = '';
      this.levelUser = '';
      document.getElementById('txtUsername').focus();
    },
    kembali : function(){
      renderMenu(pelanggan);
      divJudul.judulForm = "Data Pelanggan";
    }
  }
});

function harapLengkapi() {
  iziToast.warning({
    title: "Periksa Field!!",
    message: "Harap isi semua field!!",
    position: "topCenter",
    timeout: 1000,
    pauseOnHover: false,
    onClosed: function() {
      $('#btnSimpan').removeClass('disabled');
    }
  });
}

function errorSimpan() {
  iziToast.error({
    title: "Kesalahan penyimpanan!!",
    message: "Terdapat kesalahan dalam penyimpanan, kemungkinan username sudah digunakan",
    position: "topCenter",
    timeout: 1000,
    pauseOnHover: false,
    onClosed: function() {
      $('#btnSimpan').removeClass('disabled');
    }
  });
}

function suksesSimpan() {
  iziToast.info({
    title: "Sukses ..",
    message: "Data pelanggan baru sukses di disimpan, kembali ke halaman pelanggan",
    position: "topCenter",
    timeOut: 1000,
    pauseOnHover: false,
    onClosed: function() {
      renderMenu(pelanggan);
      divJudul.judulForm = "Data Pelanggan";
    }
  });
}
