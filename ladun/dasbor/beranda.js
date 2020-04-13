var divBeranda = new Vue({
    el : '#divBeranda',
    data : {
        caption : 'Berikut ada data statistik anda',
        jlhPelanggan : '',
        jlhCucian : ''
    }
});

//cari informasi statistik bar 
$.post('utility/getInfoBeranda', function(data){
    let obj = JSON.parse(data);
    divBeranda.jlhPelanggan = obj.jlhPelanggan;
    divBeranda.jlhCucian = obj.jlhCucian;
});