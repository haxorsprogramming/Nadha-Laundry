//inisialisasi variabel lokal
//ini bisa ada lampu lampunya
const beranda = 'dasbor/beranda';
const produkService = 'produkService';
const pelanggan = 'pelanggan';
const settingUser = 'settingUser';
const laporan = 'laporan';
const levelUser = 'levelUser';
const kartuLaundry = 'kartuLaundry';
const laundryRoom = 'laundryRoom';
const detailCucian = 'laundryRoom/detailCucian';
const dataTransaksi = 'dataTransaksi';
const pengeluaranLaundry = 'pengeluaranLaundry';
const manajemenUser = 'manajemenUser';
const arusKas = 'arusKas';
const pengaturanUmum = 'pengaturanUmum';
const laporanTransaksi = 'laporanTransaksi';

const d = new Date();
const tahun = d.getFullYear();
var halaman;

$(document).ready(function () {
  $.fakeLoader({
      timeToHide:3200,
      bgColor: '#20c997',
      spinner:"spinner1"
  });
});

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
    kartuLaundryAtc : function(){
      renderMenu(kartuLaundry);
      divJudul.judulForm = "Kartu Laundry";
    },
    laundryRoomAtc : function(){
      renderMenu(laundryRoom);
      divJudul.judulForm = "Laundry Room";
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
    },
    dataTransaksiAtc : function()
    {
      renderMenu(dataTransaksi);
      divJudul.judulForm = "Data Transaksi";
    },
    pengeluaranLaundryAtc : function()
    {
      renderMenu(pengeluaranLaundry);
      divJudul.judulForm = "Pengeluaran Laundry";
    },
    manajemenUserAtc : function()
    {
      renderMenu(manajemenUser);
      divJudul.judulForm = "Manajemen User";
    },
    arusKasAtc : function()
    {
      renderMenu(arusKas);
      divJudul.judulForm = "Arus Kas";
    },
    pengaturanUmumAtc : function()
    {
      renderMenu(pengaturanUmum);
      divJudul.judulForm = "Pengaturan Laundry";
    },
    laporanTransaksiAtc : function()
    {
      renderMenu(laporanTransaksi);
      divJudul.judulForm = "Laporan Transaksi";
    }
  }
});

function renderMenu(halaman) {
  $('#divUtama').html("Memuat ...");
  $('#divUtama').load(halaman);
}
