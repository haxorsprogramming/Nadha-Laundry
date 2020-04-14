$(document).ready(function(){
    $('#tblPelanggan').DataTable();
  });

  var divProdukService = new Vue({
    el : '#divProdukService',
    methods : {
        tambahProdukService : function(){
            divJudul.judulForm = "Tambah Produk / Service";
            renderMenu('produkService/formTambahProdukService');
        }
    }
  });
  