var divPengeluaranLaundry = new Vue({
    el : '#divPengeluaranLaundry',
    data : {},
    methods: {
        tambahPengeluaran : function(){
            divJudul.judulForm = "Tambah pengeluaran";
            $('#divUtama').html("Memuat form ...");
            $('#divUtama').load('pengeluaranLaundry/formTambahPengeluaran');
        }
    }
});