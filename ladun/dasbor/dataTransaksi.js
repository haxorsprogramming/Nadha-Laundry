$(document).ready(function(){
    $('#tblDataTransaksi').DataTable();
});

var divDataTransaksi = new Vue({
    el : '#divDataTransaksi',
    data : {

    },
    methods :{
        detailTransaksiAtc : function(kdTransaksi){
            $('#divUtama').html('Memuat data transaksi...');
            $('#divUtama').load('dataTransaksi/detailTransaksi',{'kdTransaksi':kdTransaksi});
           
        }
    }
});