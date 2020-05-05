var divPengaturanUmum = new Vue({
    el : '#divPengaturanUmum',
    data : {
        listPengeluaran : []
    },
    methods : {
        editAtc : function(kdSetting){
            //fungsi ke route untuk edit pengaturan
            $('#divUtama').load('pengaturanUmum/formEditPengaturan/'+kdSetting);
            divJudul.judulForm = "Edit Pengaturan";
        }
    }
});

$.post('pengaturanUmum/getDataPengaturan', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);
    //render json object ke arrlist divPengaturanUmum.listPengeluaran
    function pushTableItem(item, index){
        divPengaturanUmum.listPengeluaran.push({kdSetting : obj[index].kdSetting, caption : obj[index].caption, value : obj[index].value});
    }
    setTimeout(renderTable, 100);
});



function renderTable()
{
    $('#tblPengaturanUmum').DataTable();
}