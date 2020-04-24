var hargaAwalPub = "";
var kodePromo = "";
$('#btnProsesPembayaran').addClass('disabled');
$("#divTblPromo").hide();

var divUtama = new Vue({
  el: "#divFormPembayaran",
  data: {
    kodeService: "",
    hargaAwal: "",
    diskonLevel: "",
    diskonNum: "",
    hargaFin1: "",
    hargaAkhir: "",
    itemService: [],
    namaPromo: "",
    tunai : "0",
    kembali : ""
  },
  methods: {
    cekPromo: function () {
      let kdPromo = document.getElementById("txtKodePromo").value;
      $("#txtGunakan").addClass("disabled");
      $.post("pembayaran/getPromoData", { kdPromo: kdPromo }, function (data) {
        let obj = JSON.parse(data);
        if (obj.status === "kode_invalid") {
          window.alert("Kode promo tidak ada");
          $("#txtGunakan").removeClass("disabled");
        } else {
          let disProm = parseInt(obj.diskon);
          let hargaUpdate = parseInt(document.getElementById("txtHargaFinal").innerHTML);
          let hargaFin2 = (disProm * hargaUpdate) / 100;
          let hargaFinalPenuh = hargaUpdate - hargaFin2;
          let deks = obj.deks + " - " + obj.diskon + "%";
          // console.log(obj);
          $("#divTblPromo").show();
          document.getElementById("txtNamaPromo").innerHTML = deks;
          document.getElementById("txtHargaFinal").innerHTML = hargaFinalPenuh;
          document.getElementById("txtHargaFinalCap").innerHTML = new Intl.NumberFormat("de-DE").format(hargaFinalPenuh);
          kodePromo = kdPromo;
          $("#txtGunakan").hide();
        }
      });
    },
    prosesPembayaran: function () {
      let kodePromoSend = kodePromo;
      let kdTransaksi = document.getElementById("txtKodeTransaksi").innerHTML;
      let kdService = document.getElementById("txtKodeService").innerHTML;
      let diskonLevel = document.getElementById("txtDiskonLevel").innerHTML;
      let tunai = this.tunai;

      Swal.fire({
        title: "Konfirmasi?",
        text: "Proses pembayaran cucian?..",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.value) {
          $('#btnProsesPembayaran').hide();
        $.post("pembayaran/prosesPembayaran",{kdPromo:kodePromoSend, kdTransaksi:kdTransaksi, kdService:kdService, diskonLevel:diskonLevel, tunai:tunai},function(data){
            let obj = JSON.parse(data);
            if (obj.status === "sukses") {
              suksesBayar(kdTransaksi);
            } else {
              window.alert("Gagal simpan");
            }
          });
        }
      });
        
    },
    setTunai : function(){
      let tunai = parseInt(this.tunai);
      let hargaNow = parseInt(document.getElementById('txtHargaFinal').innerHTML);
      if(tunai < hargaNow){
        errorSetHarga();
        $('#btnProsesPembayaran').addClass('disabled');
      }else{
        let kembali = tunai - hargaNow;
        this.kembali = kembali;
        $('#btnProsesPembayaran').removeClass('disabled');
      }
     
    },
    testOut : function(){
      window.alert("Halo");
    }
  },
});

var kodeServiceBayar = document.getElementById("txtKodeService").innerHTML;

divUtama.kodeService = kodeServiceBayar;

$.post("pembayaran/getInfoItem", { kdService: kodeServiceBayar }, function (data) {
  let obj = JSON.parse(data);
  let hargaAwal = 0;
  var diskonLevel = document.getElementById("txtDiskonLevel").innerHTML;
  divUtama.diskonLevel = diskonLevel;

  obj.forEach(pushTableItem);
  function pushTableItem(item, index) {
    let tKeAngka = new Intl.NumberFormat("de-DE").format(obj[index].total);
    divUtama.itemService.push({
      teks: obj[index].namaCap,
      qt: obj[index].qt,
      total: tKeAngka,
    });
    let hargaTemp = obj[index].total;
    hargaAwal = hargaAwal + parseInt(hargaTemp);
  }
  divUtama.hargaAwal = hargaAwal;
  let hargaFin_1 = (parseInt(diskonLevel) * parseInt(hargaAwal)) / 100;
  divUtama.hargaFin1 = hargaFin_1;
  let hargaAkhir = parseInt(hargaAwal) - parseInt(hargaFin_1);
  // divUtama.hargaAkhir = hargaAkhir;
  document.getElementById("txtHargaFinal").innerHTML = hargaAkhir;
  document.getElementById("txtHargaFinalCap").innerHTML = new Intl.NumberFormat("de-DE").format(hargaAkhir);
});

function suksesBayar(kdTransaksi){
    iziToast.info({
        title: "Memproses pembayaran..",
        message: "Sedang memproses pembayaran, setelah selesai akan diarahkan ke halaman status pembayaran",
        position: "topCenter",
        timeOut : 1000,
        pauseOnHover: false,
        onClosed: function() {
            $('#divUtama').html("Memuat ...");
            $('#divUtama').load('dataTransaksi/detailTransaksi', {'kdTransaksi':kdTransaksi});
        }
      });
}

$('#btnKembali').click(function(){
  divUtama.testOut();
});

function errorSetHarga()
{
  iziToast.error({
    title: "Limit tunai!!",
    message: "Uang pembayaran harus lebih atau sama dengan jumlah total harga...",
    position: "topCenter",
    timeOut : 1000,
    pauseOnHover: false,
    onClosed: function() {}
  });
}