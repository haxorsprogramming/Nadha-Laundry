var divPengeluaranLaundry = new Vue({
    el : '#divPengeluaranLaundry',
    data : {
        dataPengeluaran : []
    },
    methods: {
        tambahPengeluaran : function(){
            divJudul.judulForm = "Tambah pengeluaran";
            $('#divUtama').html("Memuat form ...");
            $('#divUtama').load('pengeluaranLaundry/formTambahPengeluaran');
        },
        detailPengeluaran : function(kdPengeluaran){
            console.log("Ke halaman detail pengeluaran : "+kdPengeluaran);
        }
    }
});

$.post('pengeluaranLaundry/getDataPengeluaran', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);

    function pushTableItem(item, index){
        divPengeluaranLaundry.dataPengeluaran.push({
            kdPengeluaran : obj[index].kdPengeluaran,
            pengeluaran : obj[index].pengeluaran,
            keterangan : obj[index].keterangan,
            waktu : obj[index].waktu,
            jumlah : obj[index].jumlah
        });
    }

});

setTimeout(renderTable, 100);

function renderTable()
{
    $('#tblDataPengeluaran').DataTable({"order": [[ 2, "desc" ]]});
}