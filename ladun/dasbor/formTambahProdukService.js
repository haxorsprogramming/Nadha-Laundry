$(document).ready(function() {
  $('#txtNama').focus();
});

var divFormTambahProdukService = new Vue({
  el: '#divFormTambahProdukService',
  data: {
    judulbtn: 'Simpan',
    opsiSatuan: [{
        satuan: 'Kg',
        cap: 'Kilogram'
      },
      {
        satuan: 'Pcs',
        cap: 'Pcs'
      },
      {
        satuan: 'Bed',
        cap: 'Bed'
      }
    ],
    kdProduk: document.getElementById('txtKode').innerHTML,
    namaProduk: '',
    deksProduk: '',
    satuanProduk: '',
    hargaProduk: ''
  },
  methods: {
    simpanAksi: function() {
      if(this.kdProduk === '' || this.nama === '' || this.deksProduk === '' || this.satuanProduk === '' || this.hargaProduk === ''){
        harapLengkapi();
      }else{
        $('#btnSimpan').addClass('disabled');
        $.post('produkService/proTambahProdukService', {
          'kdProduk' : this.kdProduk,
          'namaProduk' : this.namaProduk,
          'deksProduk' : this.deksProduk,
          'satuanProduk' : this.satuanProduk,
          'hargaProduk' : this.hargaProduk
        }, function(data) {
          let obj = JSON.parse(data);
          if(obj.status === 'sukses'){
            suksesSimpan();
          }else{
          }
        });
      }
    },
    kembali : function(){
      renderMenu(produkService);
      divJudul.judulForm = "Produk & Service";
    },
    clearForm : function(){
      this.namaProduk = '';
      this.deksProduk = '';
      this.satuanProduk = '';
      this.hargaProduk = '';
      $('#txtNama').focus();
    }
  }
});


function suksesSimpan() {
  iziToast.info({
    title: "Sukses ..",
    message: "Data produk & service berhasil ditambahkan... kembali ke halaman awal.",
    position: "topCenter",
    timeOut: 1000,
    pauseOnHover: false,
    onClosed: function() {
      renderMenu(produkService);
      divJudul.judulForm = "Produk & Service";
    }
  });
}

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
