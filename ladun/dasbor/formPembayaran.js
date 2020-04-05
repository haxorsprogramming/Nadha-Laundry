var hargaAwalPub = '';
$('#divTblPromo').hide();

var divUtama = new Vue({
    el : '#divFormPembayaran',
    data : {
        kodeService : '',
        hargaAwal : '',
        diskonLevel : '',
        diskonNum : '',
        hargaFin1 : '',
        hargaAkhir : '',
        itemService : [],
        namaPromo : ''
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
                let hargaUpdate = parseInt(document.getElementById('txtHargaFinal').innerHTML);
                let hargaFin2 = disProm * hargaUpdate / 100;
                let hargaFinalPenuh = hargaUpdate - hargaFin2;
                let deks = obj.deks + " - " + obj.diskon + "%";
                // console.log(obj);
                $('#divTblPromo').show();
                document.getElementById('txtNamaPromo').innerHTML = deks;
                document.getElementById('txtHargaFinal').innerHTML = new Intl.NumberFormat('de-DE').format(hargaFinalPenuh);;
                // window.alert(hargaFinalPenuh);
                // this.hargaAkhir = hargaFin2;
                
               }
           });
        },
        prosesPembayaran : function(){
            window.alert("Haya");
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
        let tKeAngka = new Intl.NumberFormat('de-DE').format(obj[index].total);
        divUtama.itemService.push({teks : obj[index].namaCap, qt : obj[index].qt, total : tKeAngka});
        let hargaTemp = obj[index].total;
        hargaAwal = hargaAwal + parseInt(hargaTemp);          
    }
    divUtama.hargaAwal = hargaAwal;
    let hargaFin_1 = parseInt(diskonLevel) * parseInt(hargaAwal) / 100;
    divUtama.hargaFin1 = hargaFin_1;
    let hargaAkhir = parseInt(hargaAwal) - parseInt(hargaFin_1);
    divUtama.hargaAkhir = hargaAkhir;
});
