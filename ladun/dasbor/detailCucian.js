$(document).ready(function() {
    $(".js-example-basic-single").select2();
  });
  
  var total = 0;

  var divDetailCucian = new Vue({
    el : '#divDetailCucian',
    data : {
        serviceKd : "",
        namaService : "",
        satuan : "",
        hargaAt : "",
        qt : "",
        total : "",
        capTotal : ""
    },
    methods: {

    }
  });

  function setProduk(){
    let kdProduk = document.getElementById('txtProduk').value;
    $.post('laundryRoom/getInfoProduk', {'kdProduk':kdProduk}, function(data){
        let obj = JSON.parse(data);
        console.log(obj);
        divDetailCucian.namaService = obj.nama;
        divDetailCucian.satuan = obj.satuan;
        divDetailCucian.hargaAt = obj.harga;
        document.getElementById('txtQt').focus();
    });
  }

  function getTotal()
  {
    let harga = divDetailCucian.hargaAt;
    let qt = document.getElementById('txtQt').value;
    let total = harga * qt;
    let capTotal = Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(total);
    divDetailCucian.total = total;
    divDetailCucian.capTotal = capTotal;
  }