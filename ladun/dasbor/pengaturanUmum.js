var divPengaturanUmum = new Vue({
    el : '#divPengaturanUmum',
    data : {
        listPengeluaran : []
    },
    methods : {
        editAtc : function(kdSetting){
            window.alert(kdSetting);
        }
    }
});

$.post('pengaturanUmum/getDataPengaturan', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);

    function pushTableItem(item, index){
        divPengaturanUmum.listPengeluaran.push({kdSetting : obj[index].kdSetting, caption : obj[index].caption, value : obj[index].value});
    }
    setTimeout(renderTable, 100);
});



function renderTable()
{
    $('#tblPengaturanUmum').DataTable();
}