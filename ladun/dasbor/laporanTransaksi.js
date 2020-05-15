var waktu = new Date();
var tahunSekarang = waktu.getFullYear();

document.getElementById('txtTahun').style.display = "none";

var divLaporanTransaksi = new Vue({
    el : '#divLaporanTransaksi',
    data : {
        dataList : [],
        dataCapBulan : [],
        tipeWaktu : 'bulan',
        bulanDipilih : '',
        tahunDipilih : tahunSekarang,
        tahunSekarang : tahunSekarang
    },
    methods : {
        tampilkanAtc : function(){
            if(this.tipeWaktu === 'bulan'){
                cariTransaksiBulan();
            }else{
                cariTransaksiTahun();
            }
        }
    }
}); 
//episode ke 8
$.post('laporanTransaksi/getDefaultReport', function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);

    function pushTableItem(item, index){
        divLaporanTransaksi.dataList.push({tanggal: obj[index].tanggal, bulanIndo : obj[index].bulanIndo, jlhTransaksi : obj[index].jlhRecord, nilaiTransaksi : obj[index].nilaiTransaksi});
    }
    setTimeout(renderTable, 100);
});

$.post('utility/getListBulan', function(data){
    let obj = JSON.parse(data);
    obj.forEach(renderBulan);

    function renderBulan(item, index){
        divLaporanTransaksi.dataCapBulan.push({bulan : obj[index].bulan});
    }
});

function renderTable()
{
    $('#tblLaporanTransaksi').DataTable({"ordering": false});
}

function resetTable(){
    $('#tblLaporanTransaksi').dataTable().fnClearTable();
    $('#tblLaporanTransaksi').dataTable().fnDestroy();
}


function setTipeWaktu()
{
    let tipeWaktu = document.getElementById('txtTipeWaktu').value;
    if(tipeWaktu === 'bulan'){
        divLaporanTransaksi.tipeWaktu = 'bulan';
        document.getElementById('txtTahun').style.display = "none";
        document.getElementById('txtBulan').style.display = "block";
    }else{
        divLaporanTransaksi.tipeWaktu = 'tahun';
        document.getElementById('txtBulan').style.display = "none";
        document.getElementById('txtTahun').style.display = "block";
    }
}

function cariTransaksiBulan()
{
    let bulan = document.getElementById('txtBulan').value;
    var bulanCaps = bulan.toLowerCase();
    $.post('laporanTransaksi/getBulanReport', {'bulan':bulanCaps}, function(data){
        let obj = JSON.parse(data);
        resetTable();
        obj.forEach(pushTableItem);
        function pushTableItem(item, index){
            divLaporanTransaksi.dataList.push({tanggal: obj[index].tanggal, bulanIndo : obj[index].bulanIndo, jlhTransaksi : obj[index].jlhRecord, nilaiTransaksi : obj[index].nilaiTransaksi});
        }
        setTimeout(renderTable, 100);

    });
}

function  cariTransaksiTahun()
{
    let tahun = document.getElementById('txtTahun').value;
    $.post('laporanTransaksi/getTahunReport',{'tahun' : tahun}, function(data){
        let obj = JSON.parse(data);
    });
}