var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        dataList : []
    },
    methods : {
        tampilkanAtc : function(){

        }
    }
}); 

$.post('laporanTransaksi/getDefaultReport', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);

    function pushTableItem(item, index){
        divLaporanTransaksi.dataList.push({tanggal: obj[index].tanggal});
    }
    setTimeout(renderTable, 100);
});

 
function renderTable()
{
    $('#tblLaporanTransaksi').DataTable({"order": [[ 2, "desc" ]]});
}
