$(document).ready(function(){
    $.post('dataTransaksi/getDataTransaksi', function(data){
        let obj = JSON.parse(data);
        obj.forEach(pushTableItem);
        //push data get utama ke halaman
        function pushTableItem(item, index){
            divDataTransaksi.dataTransaksi.push({
                invoice : obj[index].invoice,
                kodeService : obj[index].kodeService, 
                namaPelanggan : obj[index].namaPelanggan, 
                waktu : obj[index].waktu, 
                total : obj[index].total
            });          
        }
    });
   setTimeout(setDataTable, 100);
});

var divDataTransaksi = new Vue({
    el : '#divDataTransaksi',
    data : {
        dataTransaksi : []
    },
    methods :{
        detailTransaksiAtc : function(kdTransaksi){
            // window.alert(kdTransaksi);
            $('#divUtama').html('Memuat data transaksi...');
            $('#divUtama').load('dataTransaksi/detailTransaksi',{'kdTransaksi':kdTransaksi});   
        },
        tampilkanAtc : function(){
            //ambil waktu spesifik
            let tglAwal = document.getElementById('tglAwal').value;
            let tglAkhir = document.getElementById('tglAkhir').value;
            let jlhIsi = this.dataTransaksi.length;
            if(tglAwal === '' || tglAkhir === ''){
                isiTanggal();
            }else{
                var i; 
                for(i = 0; i < jlhIsi; i++){
                    this.dataTransaksi.splice(0,1);
                }
                resetTable(); 
                $.post('dataTransaksi/getDataTransaksiRange',{'tglAwal':tglAwal, 'tglAkhir':tglAkhir}, function(data){
                    let obj = JSON.parse(data);
                    obj.forEach(pushTableItem);
                    function pushTableItem(item, index){
                        divDataTransaksi.dataTransaksi.push({
                            invoice : obj[index].invoice,
                            kodeService : obj[index].kodeService, 
                            namaPelanggan : obj[index].namaPelanggan, 
                            waktu : obj[index].waktu, 
                            total : obj[index].total
                        });          
                    }
                });
                setTimeout(setDataTable, 100);
            }
        }
    }
});

    
function setDataTable(){
    $('#tblDataTransaksi').DataTable({"order": [[ 2, "desc" ]]});
}

function resetTable(){
    $('#tblDataTransaksi').dataTable().fnClearTable();
    $('#tblDataTransaksi').dataTable().fnDestroy();
}

function isiTanggal(){
iziToast.warning({
    title: "Isi tanggal..",
    message: "Harap isi tanggal ... !!",
    position: "topCenter",
    timeOut: false,
    pauseOnHover: false,
    onClosed: function() {
        $('#divUtama').html("Memuat ...");
        $('#divUtama').load('pengeluaranLaundry/pengeluaranLaundry');
    }
  });
}