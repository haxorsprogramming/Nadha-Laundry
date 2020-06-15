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
        },
        hapusAtc : function(kdPromo)
        {
           hapusPromo(kdPromo);
        }
    }
});

function hapusPromo(kdPromo)
{
    Swal.fire({
        title: 'Hapus?',
        text: "Apakah kamu yakin ingin menghapus promo "+kdPromo+" ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText : 'Batal'
      }).then((result) => {
        if (result.value) {
            $.post('promo/hapusPromo',{'kdPromo':kdPromo}, function(data){
                Swal.fire({
                    icon : 'success',
                    title : 'Sukses',
                    text : 'Sukses menghapus promo'
                });
                renderMenu(promo);
                divJudul.judulForm = "Kode promo";
            });
        }
      });
    
}

function prosesSimpan()
{
    let kdPromo = divPromo.kdPromo;
    let deks = divPromo.deks;
    let diskon = divPromo.diskon;
    $.post('promo/prosesTambahPromo',{'kdPromo':kdPromo, 'deks':deks, 'diskon':diskon}, function(data){
        let obj = JSON.parse(data);
        let status = obj.status;
        if(status === 'exist'){
            usernameExitst();
        }else{
            suksesTambah();
        }
    });
}

function getDataPromo()
{
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
}

function suksesTambah()
{
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: 'Kode promo baru berhasil ditambah..'
      });
      resetTable();
      getDataPromo();
      setTimeout(renderTable, 100);
      document.getElementById('txtKodePromo').value = '';
      document.getElementById('txtDeks').value = '';
      document.getElementById('txtDiskon').value = '';
      $('#divTambahPromo').hide();
}

function errorIsi()
{
    Swal.fire({
        icon: 'error',
        title: 'Isi field..',
        text: 'Harap isi semua field!!!'
      });
}

function usernameExitst()
{
    Swal.fire({
        icon: 'error',
        title: 'Kode promo',
        text: 'Kode promo sudah ada, buat kode promo kembali!!'
      });
}

getDataPromo();
setTimeout(renderTable, 100);

function renderTable()
{
    $('#tblPromo').DataTable({"ordering":false});
}

function resetTable()
{
    $('#tblPromo').dataTable().fnClearTable();
    $('#tblPromo').dataTable().fnDestroy();
}