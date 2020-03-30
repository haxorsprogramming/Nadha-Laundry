$(document).ready(function() {
    $(".js-example-basic-single").select2();
    var kdRegistrasi = document.getElementById('txtKdRegistrasi').innerHTML;
    divDetailCucian.kodeRegistrasi = kdRegistrasi;
    //ambil data item service
    $.post('/laundryRoom/getItemService',{'kdRegistrasi':kdRegistrasi} ,function(data){
        let obj = JSON.parse(data);
        obj.forEach(pushTableItem);
        function pushTableItem(item, index){
                      
        }
    });

});

  var total = 0;

  var divDetailCucian = new Vue({
    el : '#divDetailCucian',
    data : {
        kodeRegistrasi : "",
        serviceKd : "",
        namaService : "",
        satuan : "",
        hargaAt : "",
        hargaAtCap : "",
        qt : "",
        total : "",
        capTotal : "",
        listItem : [
            {teks : 'Cuci bersih', qt : '3', total : 'Rp. 20.000'},
        ]
    },
    methods: {
        tambahItem : function(){
            let kdRegistrasi = this.kodeRegistrasi;
            let serviceKd = this.serviceKd;
            let qt = this.qt;
            let hargaAt = this.hargaAt;

            console.log({'kdReg': kdRegistrasi, 'serviceKd':serviceKd, 'qt': qt});
            $.post('laundryRoom/prosesTambahItem',{'kdReg': kdRegistrasi, 'serviceKd':serviceKd, 'qt': qt, 'hargaAt':hargaAt},function(data){
                let obj = JSON.parse(data);
                console.log(obj);
            });
        }
    }
  });

  function setProduk(){
    let kdProduk = document.getElementById('txtProduk').value;
    $.post('laundryRoom/getInfoProduk', {'kdProduk':kdProduk}, function(data){
        let obj = JSON.parse(data);
        divDetailCucian.serviceKd = obj.kd_service;
        divDetailCucian.namaService = obj.nama;
        divDetailCucian.satuan = obj.satuan;
        divDetailCucian.hargaAt = obj.harga;
        divDetailCucian.hargaAtCap = Intl.NumberFormat('en-IN', {maximumSignificantDigits : 3}).format(obj.harga);
        document.getElementById('txtQt').focus();
    });
  }

  function getTotal()
  {
    let harga = divDetailCucian.hargaAt;
    let qt = document.getElementById('txtQt').value;
    let total = harga * qt;
    let capTotal = Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(total);
    divDetailCucian.qt = qt;
    divDetailCucian.total = total;
    divDetailCucian.capTotal = capTotal;
  }