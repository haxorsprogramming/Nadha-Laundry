var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        typeWaktu : 'tahun',
        dataRilisTahun : [],
        dataHarian : [],
        tahunGrap : '',
        bulanGrap : '',
        tanggalGrap : '',
        tahunCapGrap : ''
    },
    methods : {
        tahunDetails : function(tahun){
            if(this.typeWaktu === 'tahun'){
                this.typeWaktu = 'bulan';
                this.tahunGrap = tahun;
                divJudul.judulForm = "Laporan Transaksi (Tahun "+tahun+")";
                // document.getElementById('txtTahunHide').innerHTML = "/"+tahun;
                this.tahunCapGrap =  "/"+tahun;
                document.getElementById('capSesiWaktu').innerHTML = "Bulan";
                clearDataTable();
                getDataTahunSub(tahun);
            }else if(this.typeWaktu === 'bulan'){
                this.typeWaktu = 'tanggal';
                this.bulanGrap = tahun;
                document.getElementById('capSesiWaktu').innerHTML = "Tanggal";
                divJudul.judulForm = "Laporan Transaksi (Tahun "+this.tahunGrap+", Bulan "+this.bulanGrap+")";
                clearDataTable();
                getDataBulan();
            }else{
                this.typeWaktu = 'tanggal';
                this.tanggalGrap = tahun;
                document.getElementById('capSesiWaktu').innerHTML = "Waktu";
                divJudul.judulForm = "Laporan Transaksi (Tahun "+this.tahunGrap+", Bulan "+this.bulanGrap+", Tanggal "+this.tanggalGrap+")";
                clearDataTable();
                getDataTanggal();
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
        obj.forEach(pushTableItem);
        function pushTableItem(item, index){
            divLaporanTransaksi.dataRilisTahun.push({
                tahun : obj[index].tanggal,
                jlhTransaksi : obj[index].totalTransaksi,
                nilaiTransaksi : obj[index].nilaiTransaksi,
                jlhTransaksiKeluar : obj[index].totalTransaksiKeluar,
                nilaiTransaksiKeluar : obj[index].nilaiTransaksiKeluar,
            });
        }
        setTimeout(setDataTableNoSort, 100);
    });
}

function getDataTanggal()
{
    let tahun = divLaporanTransaksi.tahunGrap;
    let bulan = divLaporanTransaksi.bulanGrap;
    let tanggal = divLaporanTransaksi.tanggalGrap;
    $('#tblDetailTanggal').show();
    $('#tblLaporanTransaksi').hide();
    $.post('laporanTransaksi/getTanggalReport',{'tahun':tahun, 'bulan':bulan, 'tanggal':tanggal}, function(data){
        let obj = JSON.parse(data);
        // console.log(obj);
        obj.forEach(pushTableItem);
        function pushTableItem(item, index){
            divLaporanTransaksi.dataHarian.push({
                waktu : obj[index].waktu,
                arus : obj[index].arus,
                jumlah : obj[index].jumlah,
                kdTransaksi : obj[index].kdTransaksi
            });
        }
        setTimeout(setTabelHarian, 100);
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

function setTabelHarian()
{
    $('#tblDetailTanggal').DataTable();
}

//inisialisasi seluruh alur program
$('#tblDetailTanggal').hide();
getDataTahun();
setTimeout(setDataTable, 100);