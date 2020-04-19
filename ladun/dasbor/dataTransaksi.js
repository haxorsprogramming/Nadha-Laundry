$(document).ready(function(){
    $.post('dataTransaksi/getDataTransaksi', function(data){
        let obj = JSON.parse(data);
        console.log(obj);
        obj.forEach(pushTableItem);
        function pushTableItem(item, index){
            divDataTransaksi.dataTransaksi.push({
                invoice : obj[index].invoice,
                kodeService : obj[index].kodeService, 
                namaPelanggan : obj[index].namaPelanggan, 
                waktu : obj[index].waktu, 
                total : obj[index].total
            });          
        }
    });
   setTimeout(setDataTable, 100);
});

var divDataTransaksi = new Vue({
    el : '#divDataTransaksi',
    data : {
        dataTransaksi : []
    },
    methods :{
        detailTransaksiAtc : function(kdTransaksi){
            // window.alert(kdTransaksi);
            $('#divUtama').html('Memuat data transaksi...');
            $('#divUtama').load('dataTransaksi/detailTransaksi',{'kdTransaksi':kdTransaksi});   
        },
        tampilkanAtc : function(){
            let tglAwal = document.getElementById('tglAwal').value;
            let tglAkhir = document.getElementById('tglAkhir').value;
            $.post('dataTransaksi/getDataTransaksiRange', function(data){
                
            });
        }
    }
});
//inisialisasi data transaksi awal
    
function setDataTable(){
    $('#tblDataTransaksi').DataTable();
}