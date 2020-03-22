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
    },
    kembali : function(){
      
    }
  }
});


function suksesSimpan() {
  iziToast.info({
    title: "Sukses ..",
    message: "Data produk & service berhasil ditambahkan... kembali ke halaman awal.",
    position: "topCenter",
    timeOut: 500,
    pauseOnHover: false,
    onClosed: function() {
      renderMenu(produkService);
      divJudul.judulForm = "Produk & Service";
    }
  });
}
