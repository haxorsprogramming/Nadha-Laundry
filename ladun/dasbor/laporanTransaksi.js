var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        dataList : [],
        dataCapBulan : []
    },
    methods : {
        tampilkanAtc : function(){

        }
    }
}); 
//episode ke 8
$.post('laporanTransaksi/getDefaultReport', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);

    function pushTableItem(item, index){
        divLaporanTransaksi.dataList.push({tanggal: obj[index].tanggal, bulanIndo : obj[index].bulanIndo, koktakbisa : obj[index].bulanIndo});
    }
    setTimeout(renderTable, 100);
});

$.post('utility/getListBulan', function(data){
    let obj = JSON.parse(data);
    obj.forEach(renderBulan);

    function renderBulan(item, index){
        divLaporanTransaksi.dataCapBulan.push({bulan : obj[index].bulan});
    }
});

function renderTable()
{
    $('#tblLaporanTransaksi').DataTable({"order": [[ 2, "desc" ]]});
}
 