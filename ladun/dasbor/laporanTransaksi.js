var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        typeWaktu : 'tahun'
    }
});

$.post('laporanTransaksi/getRelaseTahun', function(data){
    let obj = JSON.parse(data);
    console.log(obj);
});

function setDataTable(){
    $('#tblLaporanTransaksi').DataTable();
}

setTimeout(setDataTable, 100);