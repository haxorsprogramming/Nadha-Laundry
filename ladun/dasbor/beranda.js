var divBeranda = new Vue({
    el : '#divBeranda',
    data : {
        caption         : 'Berikut ada data statistik anda',
        jlhPelanggan    : '',
        jlhCucian       : '',
        route           : 'utility/getInfoBeranda'
    },
    methods : {
        pelangganProfile : function(username){
            $('#divUtama').html("Memuat ...");
            $('#divUtama').load('pelanggan/pelangganProfile/'+username);
        },
        getInfoStatBar : function() {
            
        }
    }
});

$.post('utility/getInfoBeranda', function(data){
    let obj = JSON.parse(data);
    // console.log(obj);
    divBeranda.jlhPelanggan     = obj.jlhPelanggan;
    divBeranda.jlhCucian        = obj.jlhCucian;
});