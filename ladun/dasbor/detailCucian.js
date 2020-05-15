$(document).ready(function () {
  $(".js-example-basic-single").select2();
  var kdRegistrasi = document.getElementById("txtKdRegistrasi").innerHTML;
  divDetailCucian.kodeRegistrasi = kdRegistrasi;
  //ambil data item service
  $.post(
    "laundryRoom/getItemService",
    { kdRegistrasi: kdRegistrasi },
    function (data) {
      let obj = JSON.parse(data);
      obj.forEach(pushTableItem);
      function pushTableItem(item, index) {
        let tKeAngka = new Intl.NumberFormat("de-DE").format(obj[index].total);
        divDetailCucian.listItem.push({
          teks: obj[index].namaCap,
          qt: obj[index].qt,
          total: tKeAngka,
        });
      }
    }
  );
});

var total = 0;

var divDetailCucian = new Vue({
  el: "#divDetailCucian",
  data: {
    kodeRegistrasi: "",
    serviceKd: "",
    namaService: "",
    satuan: "",
    hargaAt: "",
    hargaAtCap: "",
    qt: "",
    total: "",
    capTotal: "",
    listItem: [],
  },
  methods: {
    tambahItem: function () {
      let kdRegistrasi = this.kodeRegistrasi;
      let serviceKd = this.serviceKd;
      let qt = this.qt;
      let hargaAt = this.hargaAt;
      let kdProduk = document.getElementById("txtProduk").value;
      // window.alert(kdProduk);
      if (qt === "" || qt === "0" || kdProduk === "none") {
        isiYangBenar();
      } else {
        $("#btnTambahItem").addClass("disabled");
        $("#txtQt").attr("disabled", "disabled");
        $("#txtProduk").attr("disabled", "disabled");
        $.post(
          "laundryRoom/prosesTambahItem",
          {
            kdReg: kdRegistrasi,
            serviceKd: serviceKd,
            qt: qt,
            hargaAt: hargaAt,
          },
          function (data) {
            let obj = JSON.parse(data);
            suksesUpdate();
          }
        );
      }
    },
    setSelesaiAtc: function () {
      let totalHarga = document.getElementById("txtTotalInt").innerHTML;
      let intTotalharga = parseInt(totalHarga);
      if (intTotalharga > 0) {
        setSelesai();
      } else {
        errProdukKosong();
      }
    },
    setBayar: function () {
      let totalHarga = document.getElementById("txtJumlahItem").innerHTML;
      let intTotalharga = parseInt(totalHarga);
      if (intTotalharga > 0) {
        setBayar();
      } else {
        errProdukKosong();
      }
    },
  },
});

function setProduk() {
  let kdProduk = document.getElementById("txtProduk").value;
  $.post("laundryRoom/getInfoProduk", { kdProduk: kdProduk }, function (data) {
    let obj = JSON.parse(data);
    divDetailCucian.serviceKd = obj.kd_service;
    divDetailCucian.namaService = obj.nama;
    divDetailCucian.satuan = obj.satuan;
    divDetailCucian.hargaAt = obj.harga;
    divDetailCucian.hargaAtCap = Intl.NumberFormat("en-IN", {
      maximumSignificantDigits: 3,
    }).format(obj.harga);
    document.getElementById("txtQt").focus();
  });
}

function getTotal() {
  let harga = divDetailCucian.hargaAt;
  let qt = document.getElementById("txtQt").value;
  let total = harga * qt;
  let capTotal = Intl.NumberFormat("en-IN", {
    maximumSignificantDigits: 3,
  }).format(total);
  divDetailCucian.qt = qt;
  divDetailCucian.total = total;
  divDetailCucian.capTotal = capTotal;
}

function suksesUpdate() {
  let itemLama = document.getElementById("txtJumlahItem").innerHTML;
  let intItemLama = parseInt(itemLama);
  let itemBaru = (intItemLama += 1);
  //harga
  let hargaLama = document.getElementById("txtTotalInt").innerHTML;
  let intHargaLama = parseInt(hargaLama);
  let hargaBaru = intHargaLama + parseInt(divDetailCucian.total);
  //izi toast start
  Swal.fire({
    icon: 'success',
    title: 'Item ditambahkan',
    text: 'Item sukses ditambahkan...'
  });
  divDetailCucian.listItem.push({
    teks: divDetailCucian.namaService,
    qt: divDetailCucian.qt,
    total: divDetailCucian.total,
  });
  $("#btnTambahItem").removeClass("disabled");
  $("#txtQt").removeAttr("disabled");
  $("#txtProduk").removeAttr("disabled");
  document.getElementById("txtJumlahItem").innerHTML = itemBaru;
  document.getElementById("txtTotalView").innerHTML = hargaBaru;
  //izi toas end
}
 
function isiYangBenar() {
  iziToast.warning({
    title: "Isi field!!",
    message: "Pilih produk & jumlah dengan benar ..",
    position: "topCenter",
    timeOut: 1000,
    closeOnClick: true,
    pauseOnHover: false,
    onClosed: function () {},
  });
}
//banyakan bercandanya
function setSelesai() {
  Swal.fire({
    title: "Set selesai?",
    text: "Set cucian ini ke status selesai cuci?",
    icon: "info",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.value) {
      $("#btnSetSelesai").addClass("disabled");
      $.post(
        "laundryRoom/setCucianSelesai",
        { kdService: divDetailCucian.kodeRegistrasi },
        function (data) {
          let obj = JSON.parse(data);
          konfirmasiPesanSelesai();
        }
      );
    }
  });
}

function setBayar() {
  var kdReg = document.getElementById("txtKdRegistrasi").innerHTML;
  $("#divUtama").html("Memuat ...");
  divJudul.judulForm = "Pembayaran";
  $("#divUtama").load("pembayaran/formPembayaran", { kdReg: kdReg });
}

function konfirmasiPesanSelesai() {
  iziToast.info({
    title: "Cucian selesai!!",
    message:
      "Cucian telah di-set ke status selesai. Pastikan status cucian di kartu laundry juga selesai!!",
    position: "topCenter",
    timeOut: false,
    pauseOnHover: false,
    onClosed: function () {
      renderMenu(laundryRoom);
      divJudul.judulForm = "Laundry Room";
    },
  });
}

function errProdukKosong() {
  iziToast.warning({
    title: "Produk / Item kosong!!",
    message: "Harap masukkan produk / item yang diingin dicuci !!",
    position: "topCenter",
    timeOut: 1000,
    pauseOnHover: false,
    onClosed: function () {},
  });
}
