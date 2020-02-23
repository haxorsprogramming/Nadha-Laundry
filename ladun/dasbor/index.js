//inisialisasi variabel lokal
const beranda = 'dasbor/beranda';
const produk = 'produk';
const pelanggan = 'pelanggan';
const settingUser = 'settingUser';
const laporan = 'laporan';
const d = new Date();
const tahun = d.getFullYear();
var halaman;

// fungsi pertama kali dijalankan
renderMenu(beranda);

//objek vue footer
var divFooter = new Vue({
    el : '#divFooter',
    data : {
        author : "NadhaMedia",
        tahun : tahun
    }
});

//objek vue menu
var divMenu = new Vue({
    el: '#divMenu',
    data : {
    },
    methods : {
        berandaAct : function(){
            renderMenu(beranda);
        },
        pelangganAtc : function(){
            renderMenu(pelanggan);
        }
    }
});

function renderMenu(halaman){
    $('#divUtama').html("Memuat ...");
    $('#divUtama').load(halaman);
}