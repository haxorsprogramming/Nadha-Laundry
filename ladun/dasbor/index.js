const beranda = 'dasbor/beranda';

$('#divUtama').load(beranda);
var d = new Date();
var tahun = d.getFullYear();

var divFooter = new Vue({
    el : '#divFooter',
    data : {
        author : "NadhaMedia",
        tahun : tahun
    }
});