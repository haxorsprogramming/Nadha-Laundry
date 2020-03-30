$(document).ready(function(){
    $('#tblLaundryRoom').DataTable();
});

var divLaundryRoom = new Vue({
    el : '#divLaundryRoom',
    data : {
        listKet : [
            { teks : 'Untuk menambahkan item cucian, dapat melalui menu detail, atau klik kode registrasi'},
             {teks : 'Cucian yang sudah selesai tidak akan ditampilkan disini'}
        ]
    },
    methods: {
        detailsAtc : function(kd){
            divJudul.judulForm = "Detail Cucian";
            $('#divUtama').html("Memuat ...");
            $('#divUtama').load('laundryRoom/detailCucian',{'kd':kd});
        }
    }
})