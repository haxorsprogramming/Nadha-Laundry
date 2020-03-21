$(document).ready(function() {
  $('#txtKd').focus();
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
    kdProduk: '',
    namaProduk: '',
    deksProduk: '',
    satuanProduk: '',
    hargaProduk: ''
  },
  methods: {
    simpanAksi: function() {
      $.post('produkService/proTambahProdukService', {
        'kdProduk': this.kdProduk,
        'namaProduk' : this.namaProduk,
        ''
      }, function(data) {

      });
    }
  }
});
