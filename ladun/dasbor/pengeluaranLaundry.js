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
        },
        hapusAtc : function(kdPengeluaran){
            hapus(kdPengeluaran);
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

function hapus(kdPengeluaran){
    Swal.fire({
        title: 'Hapus?',
        text: "Apakah kamu yakin ingin menghapus data transaksi pengeluaran ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText : 'Batal'
      }).then((result) => {
        if (result.value) {
            $.post('pengeluaranLaundry/hapusDataPengeluaran',{'kdPengeluaran':kdPengeluaran}, function(data){
                let obj = JSON.parse(data);
                berhasilHapus();
                $('#divUtama').html("Memuat ...");
                $('#divUtama').load('pengeluaranLaundry');
            });
        }
      })
}

function berhasilHapus()
{
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: 'Data transaksi berhasil dihapus'
      })
}