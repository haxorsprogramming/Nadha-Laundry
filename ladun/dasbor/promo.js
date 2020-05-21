$('#divTambahPromo').hide();

var divPromo = new Vue({
    el : '#divPromo',
    data : {
        kdPromo : '',
        deks : '',
        diskon : '',
        dataPromo : []
    },
    methods : {
        bukaFormTambahPromo : function(){
            $('#divTambahPromo').show();
            $('#btnTambahPromo').addClass('disabled');
            document.getElementById('txtKodePromo').focus();
        },
        batalAtc : function(){
            $('#divTambahPromo').hide();
            $('#btnTambahPromo').removeClass('disabled');
        },
        simpanAtc : function(){
            let kdPromo = document.getElementById('txtKodePromo').value;
            let deks = document.getElementById('txtDeks').value;
            let diskon = document.getElementById('txtDiskon').value;
            
            if(kdPromo === '' || deks === '' || diskon === ''){
                errorIsi();
            }else{
                this.kdPromo = kdPromo;
                this.deks = deks;
                this.diskon = diskon;
                prosesSimpan();
            }
        }
    }
});

$.post('promo/getDataPromo', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);
    function pushTableItem(item, index) {
        divPromo.dataPromo.push({
            kdPromo : obj[index].kdPromo,
            deks : obj[index].deks,
            diskon : obj[index].diskon,
            aktif : obj[index].aktif
        });
      }
});

function prosesSimpan()
{
    let kdPromo = divPromo.kdPromo;
    let deks = divPromo.deks;
    let diskon = divPromo.diskon;
    $.post('promo/prosesTambahPromo',{'kdPromo':kdPromo, 'deks':deks, 'diskon':diskon}, function(data){
        let obj = JSON.parse(data);
        console.log(obj);
    });
}

function errorIsi()
{
    Swal.fire({
        icon: 'error',
        title: 'Isi field..',
        text: 'Harap isi semua field!!!'
      });
}

setTimeout(renderTable, 100);

function renderTable()
{
    $('#tblPromo').DataTable({"ordering":false});
}