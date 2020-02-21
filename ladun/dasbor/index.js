const beranda = 'dasbor/beranda';
const produk = 'dasbor/produk';
const settingUser = 'dasbor/settingUser';
const d = new Date();
const tahun = d.getFullYear();
var halaman;

renderMenu(beranda);

var divFooter = new Vue({
    el : '#divFooter',
    data : {
        author : "NadhaMedia",
        tahun : tahun
    }
});

var divMenu = new Vue({
    el: '#divMenu',
    data : {
    },
    methods : {
        berandaAct : function(){
            renderMenu(beranda);
        }
    }
});

function renderMenu(halaman){
    $('#divUtama').html("Memuat ...");
    $('#divUtama').load(halaman);
}