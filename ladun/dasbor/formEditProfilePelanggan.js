var divFormUpdateProfilePelanggan = new Vue({
  el: '#divFormUpdateProfilePelanggan',
  data: {},
  methods: {
    prosesUpdateProfile: function() {
      let username = document.getElementById('txtUsername').innerHTML;
      let namaLengkap = document.getElementById('txtNama').value;
      let alamat = document.getElementById('txtAlamat').value;
      let hp = document.getElementById('txtHp').value;
      let email = document.getElementById('txtEmail').value;
      let levelUser = document.getElementById('txtLevelUser').value;
      disabledForm();
      $.post('pelanggan/proEditProfilePelanggan', {'username': username,'namaLengkap': namaLengkap,'alamat': alamat,'nomorHandphone': hp,'email': email,'levelUser': levelUser}, function(data){
        suksesUpdate();
      });
    },
    kembali : function(){
      let username = document.getElementById('txtUsername').innerHTML;
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('pelanggan/pelangganProfile',{'username':username});
    }
  }
});

function suksesUpdate() {
  
  iziToast.info({
    title: "Update profile ..",
    message: "Sedang mengupdate data pelanggan, akan kembali ke profile setelah proses selesai",
    position: "topCenter",
    timeOut: 300,
    pauseOnHover: false,
    onClosed: function() {
      let username = document.getElementById('txtUsername').innerHTML;
      divJudul.judulForm = "Detail Pelanggan";
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('pelanggan/pelangganProfile',{'username':username});
    }
  });
}

function disabledForm() {
  $('#btnSimpan').addClass('disabled');
  $('#btnSimpan').html('Updating ...');
  document.getElementById('txtNama').setAttribute("disabled", "disabled");
  document.getElementById('txtAlamat').setAttribute("disabled", "disabled");
  document.getElementById('txtHp').setAttribute("disabled", "disabled");
  document.getElementById('txtEmail').setAttribute("disabled", "disabled");
  document.getElementById('txtLevelUser').setAttribute("disabled", "disabled");
}
