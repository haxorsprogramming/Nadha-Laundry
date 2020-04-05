var hargaAwalPub = '';

var divUtama = new Vue({
    el : '#divFormPembayaran',
    data : {
        kodeService : '',
        hargaAwal : '',
        diskonLevel : '',
        diskonNum : '',
        hargaFin1 : '',
        hargaAkhir : '',
        itemService : []
    },
    methods : {
        cekPromo : function() {
           let kdPromo = document.getElementById('txtKodePromo').value;
           $.post('pembayaran/getPromoData',{'kdPromo':kdPromo},function(data){
               let obj = JSON.parse(data);
               if(obj.status === 'kode_invalid'){
                window.alert("Kode promo tidak ada");
               }else{
                let disProm = parseInt(obj.diskon);
                let hargaUpdate = this.hargaFin1;
                let hargaFin2 = hargaUpdate - disProm;
                window.alert(hargaUpdate);
                this.hargaAkhir = hargaFin2;
                
               }
           });
        }
    }
});

var kodeServiceBayar = document.getElementById('txtKodeService').innerHTML;

divUtama.kodeService = kodeServiceBayar;


$.post('pembayaran/getInfoItem', {'kdService':kodeServiceBayar}, function(data){
    let obj = JSON.parse(data);
    let hargaAwal = 0;
    var diskonLevel = document.getElementById('txtDiskonLevel').innerHTML;
    divUtama.diskonLevel = diskonLevel;

    obj.forEach(pushTableItem);
    function pushTableItem(item, index){
        divUtama.itemService.push({teks : obj[index].namaCap, qt : obj[index].qt, total : obj[index].total});
        let hargaTemp = obj[index].total;
        hargaAwal = hargaAwal + parseInt(hargaTemp);          
    }
    divUtama.hargaAwal = hargaAwal;
    let hargaFin_1 = parseInt(diskonLevel) * parseInt(hargaAwal) / 100;
    divUtama.hargaFin1 = hargaFin_1;
    let hargaAkhir = parseInt(hargaAwal) - parseInt(hargaFin_1);
    divUtama.hargaAkhir = hargaAkhir;
});
