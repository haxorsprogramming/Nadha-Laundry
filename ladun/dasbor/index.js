//inisialisasi variabel lokal
const beranda = 'dasbor/beranda';
const produkService = 'produkService';
const pelanggan = 'pelanggan';
const settingUser = 'settingUser';
const laporan = 'laporan';
const levelUser = 'levelUser';
const d = new Date();
const tahun = d.getFullYear();
var halaman;

// fungsi pertama kali dijalankan
renderMenu(beranda);

//objek vue footer
var divFooter = new Vue({
  el: '#divFooter',
  data: {
    author: "NadhaMedia",
    tahun: tahun
  }
});

var divJudul = new Vue({
  el :'#capUtama',
  data : {
    judulForm : 'Beranda'
  }
});

//objek vue menu
var divMenu = new Vue({
  el: '#divMenu',
  data: {},
  methods: {
    berandaAct: function() {
      renderMenu(beranda);
      divJudul.judulForm = "Beranda";
    },
    pelangganAtc: function() {
      renderMenu(pelanggan);
      divJudul.judulForm = "Data Pelanggan";
    },
    levelUserAtc : function() {
      renderMenu(levelUser);
      divJudul.judulForm = "Level User";
    },
    produkServiceAtc : function()
    {
      renderMenu(produkService);
      divJudul.judulForm = "Produk & Service";
    }
  }
});

function renderMenu(halaman) {
  $('#divUtama').html("Memuat ...");
  $('#divUtama').load(halaman);
}
