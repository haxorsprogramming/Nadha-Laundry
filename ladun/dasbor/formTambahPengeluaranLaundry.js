var divFormTambahPengeluaranLaundry = new Vue({
    el: '#divFormTambahPengeluaranLaundry',
    data: {
        kodePengeluaran: '',
        namaPengeluaran: '',
        deks: '',
        jumlah: '',
        tanggal : ''
    },
    methods: {
        simpan: function () {
                this.kodePengeluaran = document.getElementById('txtKodePengeluaran').innerHTML;
                this.namaPengeluaran = document.getElementById('txtNamaPengeluaran').value;
                this.deks = document.getElementById('txtDeks').value;
                this.jumlah = document.getElementById('txtJumlah').value;
                this.tanggal = document.getElementById('txtTanggal').value;
                if(this.namaPengeluaran === '' || this.deks === '' || this.jumlah === '' || this.jumlah === 0 ){
                    lengkapiIsi();
                }else{
                    $('#btnSimpan').addClass('disabled');
                    $.post('pengeluaranLaundry/prosesTambahPengeluaran', { 
                        'kdPengeluaran': this.kodePengeluaran, 'namaPengeluaran': this.namaPengeluaran, 'deks': this.deks, 'jumlah':this.jumlah, 'tanggal':this.tanggal}, 
                        function (data) {
                            suksesSimpan();
                    });
                }                
        }
    }
});

document.getElementById('txtNamaPengeluaran').focus();

function suksesSimpan()
{
    iziToast.info({
        title: "Sukses tambah..",
        message: "Pengeluaran baru telah ditambah ... !!",
        position: "topCenter",
        timeOut: false,
        pauseOnHover: false,
        onClosed: function() {
            divJudul.judulForm = "Pengeluaran Laundry";
            $('#divUtama').html("Memuat ...");
            $('#divUtama').load('pengeluaranLaundry');
        }
      });
}

function lengkapiIsi()
{
    iziToast.warning({
        title: "Isi field..",
        message: "Harap isi field ... !!",
        position: "topCenter",
        timeOut: false,
        pauseOnHover: false,
        onClosed: function() {}
      });
}