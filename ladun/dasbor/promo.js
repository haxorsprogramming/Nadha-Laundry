var divPromo = new Vue({
    el : '#divPromo',
    data : {
        dataPromo : []
    }
});

$.post('promo/getDataPromo', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);
    console.log(obj);
    function pushTableItem(item, index) {
        divPromo.dataPromo.push({
            kdPromo : obj[index].kdPromo,
            deks : obj[index].deks,
            diskon : obj[index].diskon,
            aktif : obj[index].aktif
        });
      }
});

setTimeout(renderTable, 100);

function renderTable()
{
    $('#tblPromo').DataTable({"ordering":false});
}