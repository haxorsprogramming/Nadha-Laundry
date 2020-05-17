var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        typeWaktu : 'tahun',
        dataRilisTahun : [],
        tahunGrap : '',
        bulanGrap : '',
        tanggalGrap : ''
    },
    methods : {
        tahunDetails : function(tahun){
            if(this.typeWaktu === 'tahun'){
                this.typeWaktu = 'bulan';
                this.tahunGrap = tahun;
                divJudul.judulForm = "Laporan Transaksi (Tahun "+tahun+")";
                document.getElementById('capSesiWaktu').innerHTML = "Bulan";
                clearDataTable();
                getDataTahunSub(tahun);
            }else{
                document.getElementById('capSesiWaktu').innerHTML = "Tanggal";
                this.bulanGrap = tahun;
                divJudul.judulForm = "Laporan Transaksi (Tahun "+this.tahunGrap+", Bulan "+this.bulanGrap+")";
                clearDataTable();
                getDataBulan();
            }
        }
    }
});

function getDataTahun(){
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
}

function getDataTahunSub(tahun)
{
    $.post('laporanTransaksi/getTahunReport', {'tahun':tahun}, function(data){
        let obj = JSON.parse(data);
        // console.log(obj);
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

function getDataBulan()
{
    let tahun = divLaporanTransaksi.tahunGrap;
    let bulan = divLaporanTransaksi.bulanGrap;
    // window.alert(tahun+" "+bulan);
    $.post('laporanTransaksi/getBulanReport',{'tahun' : tahun, 'bulan': bulan}, function(data){
        let obj = JSON.parse(data);
        // console.log(obj);
        obj.forEach(pushTableItem);
        function pushTableItem(item, index){
            divLaporanTransaksi.dataRilisTahun.push({
                tahun : obj[index].tanggal,
                jlhTransaksi : obj[index].totalTransaksi,
                nilaiTransaksi : obj[index].nilaiTransaksi,
                jlhTransaksiKeluar : obj[index].tanggal,
                nilaiTransaksiKeluar : obj[index].tanggal,
            });
        }
        setTimeout(setDataTableNoSort, 100);
    });
}

function clearDataTable()
{
    let jlhIsi = divLaporanTransaksi.dataRilisTahun.length;
    var i; 
    for(i = 0; i < jlhIsi; i++){
        divLaporanTransaksi.dataRilisTahun.splice(0,1);
    }
    resetTable();
}

function setDataTable()
{
    $('#tblLaporanTransaksi').DataTable();
}

function setDataTableNoSort()
{
    $('#tblLaporanTransaksi').DataTable({"ordering": false});
}

function resetTable()
{
    $('#tblLaporanTransaksi').dataTable().fnClearTable();
    $('#tblLaporanTransaksi').dataTable().fnDestroy();
}

//inisialisasi seluruh alur program
getDataTahun();
setTimeout(setDataTable, 100);