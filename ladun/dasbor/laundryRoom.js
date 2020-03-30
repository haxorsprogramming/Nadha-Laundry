$(document).ready(function(){
    $('#tblLaundryRoom').DataTable();
});

var divLaundryRoom = new Vue({
    el : '#divLaundryRoom',
    data : {
        listKet : [
            { teks : 'Untuk menambahkan item cucian, dapat melalui menu detail, atau klinik kode registrasi'},
             {teks : 'Cucian yang sudah selesai tidak akan ditampilkan disini'}
        ]
    },
    methods: {
        detailsAtc : function(kd){
            
        }
    }
})