$(document).ready(function() {
    $(".js-example-basic-single").select2();
    var kdRegistrasi = document.getElementById('txtKdRegistrasi').innerHTML;
    divDetailCucian.kodeRegistrasi = kdRegistrasi;
    //ambil data item service
    $.post('laundryRoom/getItemService',{'kdRegistrasi':kdRegistrasi} ,function(data){
        let obj = JSON.parse(data);
        obj.forEach(pushTableItem);
        function pushTableItem(item, index){
            divDetailCucian.listItem.push({teks : obj[index].namaCap, qt : obj[index].qt, total : obj[index].total});          
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
        listItem : []
    },
    methods: {
        tambahItem : function(){
            let kdRegistrasi = this.kodeRegistrasi;
            let serviceKd = this.serviceKd;
            let qt = this.qt;
            let hargaAt = this.hargaAt;
            let kdProduk = document.getElementById('txtProduk').value;
            // window.alert(kdProduk);
            if(qt === "" || qt === "0" || kdPproduk === "none"){
                isiYangBenar();
            }else{
                $('#btnTambahItem').addClass('disabled');
                $('#txtQt').attr('disabled','disabled');
                $('#txtProduk').attr('disabled','disabled');
                $.post('laundryRoom/prosesTambahItem',{'kdReg': kdRegistrasi, 'serviceKd':serviceKd, 'qt': qt, 'hargaAt':hargaAt},function(data){
                    let obj = JSON.parse(data);
                    suksesUpdate();
                });
            }
          
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

  function suksesUpdate() {
      let itemLama = document.getElementById('txtJumlahItem').innerHTML;
      let intItemLama = parseInt(itemLama);
      let itemBaru = intItemLama += 1;
      //harga 
      let hargaLama = document.getElementById('txtTotalInt').innerHTML;
      let intHargaLama = parseInt(hargaLama);
      let hargaBaru = intHargaLama + parseInt(divDetailCucian.total);

    iziToast.info({
      title: "Menambahkan item ..",
      message: "Item akan ditambahkan ke list cucian ...",
      position: "topCenter",
      timeOut: 300,
      pauseOnHover: false,
      onClosed: function() {
        divDetailCucian.listItem.push({teks : divDetailCucian.namaService, qt : divDetailCucian.qt, total : divDetailCucian.total});
        $('#btnTambahItem').removeClass('disabled');
        $('#txtQt').removeAttr('disabled');
        $('#txtProduk').removeAttr('disabled');
        document.getElementById('txtJumlahItem').innerHTML = itemBaru;
        document.getElementById('txtTotalView').innerHTML = hargaBaru;   
      }
    });
  }
function isiYangBenar(){
    iziToast.error({
        title: "Isi field!!",
        message: "Pilih produk & jumlah dengan benar ..",
        position: "topCenter",
        timeOut: false,
        pauseOnHover: false,
        onClosed: function() {
          
        }
      });
}
  