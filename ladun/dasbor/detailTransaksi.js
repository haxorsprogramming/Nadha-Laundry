
var divDetailTransaksi = new Vue({
    el : '#divDetailTransaksi',
    data : {
        namaLaundry : '-',
        alamatLaundry : '-',
        kotaLaundry : '-',
        kabupatenLaundry : '-',
        provinsiLaundry : '-',
        kodePosLaundry : '-',
        namaPelanggan : '-',
        emailPelanggan : '-',
        alamatPelanggan : '-'
        
    },
    methods: {
        cetakAtc : function(){
            window.location.assign('dataTransaksi/cetak');
        },
        kembaliAtc : function(){
            document.documentElement.scrollTop = 0;
            renderMenu(dataTransaksi);
            divJudul.judulForm = "Data Transaksi";
        }
    }
});

var kodeService = document.getElementById('txtKodeService').innerHTML;

$.post('utility/getInfoPelanggan',{'kodeService':kodeService}, function(data){
    let obj = JSON.parse(data);
    divDetailTransaksi.namaPelanggan = obj.namaPelanggan;
    divDetailTransaksi.emailPelanggan = obj.emailPelanggan;
    divDetailTransaksi.alamatPelanggan = obj.alamatPelanggan;
});

$.post('utility/getInfoLaundry', function(data){
    let obj = JSON.parse(data);
    divDetailTransaksi.namaLaundry = obj.namaLaundry;
    divDetailTransaksi.alamatLaundry = obj.alamatLaundry
    divDetailTransaksi.kotaLaundry = obj.kotaLaundry;
    divDetailTransaksi.kabupatenLaundry = obj.kabupatenLaundry;
    divDetailTransaksi.provinsiLaundry = obj.provinsiLaundry;
    divDetailTransaksi.kodePosLaundry = obj.kodePosLaundry;
});
