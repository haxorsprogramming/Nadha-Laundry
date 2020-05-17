var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        typeWaktu : 'tahun',
        dataRilisTahun : []
    },
    methods : {
        tahunDetails : function(tahun){
            divJudul.judulForm = "Laporan Transaksi (Tahun "+tahun+")";
            document.getElementById('capSesiWaktu').innerHTML = "Bulan";
            let jlhIsi = this.dataRilisTahun.length;
                
            var i; 
            for(i = 0; i < jlhIsi; i++){
                this.dataRilisTahun.splice(0,1);
            }
            resetTable();

            $.post('laporanTransaksi/getTahunReport', {'tahun':tahun}, function(data){
                let obj = JSON.parse(data);
                console.log(obj);
              
                obj.forEach(pushTableItem);
                function pushTableItem(item, index){
                    divLaporanTransaksi.dataRilisTahun.push({
                        tahun : obj[index].bulan,
                        jlhTransaksi : obj[index].jlhTransaksi,
                        nilaiTransaksi : obj[index].nilaiTransaksi,
                        jlhTransaksiKeluar : obj[index].jlhTransaksiKeluar,
                        nilaiTransaksiKeluar : obj[index].nilaiTransaksiKeluar,
                    });
                }

                setTimeout(setDataTableNoSort, 100);
            });
        }
    }
});

$.post('laporanTransaksi/getRelaseTahun', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);
    function pushTableItem(item, index){
        divLaporanTransaksi.dataRilisTahun.push({
            tahun : obj[index].tahun,
            jlhTransaksi : obj[index].jlhTransaksi,
            nilaiTransaksi : obj[index].nilaiTransaksi,
            jlhTransaksiKeluar : obj[index].jlhTransaksiKeluar,
            nilaiTransaksiKeluar : obj[index].nilaiTransaksiKeluar
        });          
    }
});

function setDataTable(){
    $('#tblLaporanTransaksi').DataTable();
}


function setDataTableNoSort()
{
    $('#tblLaporanTransaksi').DataTable({"ordering": false});
}


function resetTable(){
    $('#tblLaporanTransaksi').dataTable().fnClearTable();
    $('#tblLaporanTransaksi').dataTable().fnDestroy();
}


setTimeout(setDataTable, 100);