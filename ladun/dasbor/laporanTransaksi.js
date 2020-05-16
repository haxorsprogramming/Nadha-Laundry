var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        typeWaktu : 'tahun'
    }
});


function setDataTable(){
    $('#tblLaporanTransaksi').DataTable();
}

setTimeout(setDataTable, 100);