var divBroadcastPesan = new Vue({
    el : '#divBroadcastPesan',
    data : {
        judulPesan : '',
        isiPesan : '',
        tipeProses : 'langsung',
        waktu : ''
    },
    methods : {
        tambahBroadcastAtc : function()
        {
            $('#divFormTambahBroadcast').show();
            $('#divTabelBroadcast').hide();
            document.getElementById('txtJudul').focus();
        },
        prosesBroadcast : function()
        {
            this.judulPesan = document.getElementById('txtJudul').value;
            this.isiPesan = document.getElementById('txtIsi').value;
            this.tipeProses = document.getElementById('txtProses').value;
            this.waktu = document.getElementById('txtWaktuProses').value;
            if(this.judulForm === '' || this.isiPesan === '' || this.tipeProses === ''){
                Swal.fire({icon : 'warning', title : 'Isi field!!', text : 'Harap lengkapi field!....'});
            }else{
                prosesKirimPesan();
            }
        },
        hapusAtc : function(idPesan)
        {
            hapusBroadcast(idPesan);
        }
    }
});

$('#divStatusBroadcast').hide();
$('#divFormTambahBroadcast').hide();
$('#formWaktuProses').hide();
$('#tblBroadcast').DataTable({"order": [[ 2, "desc" ]]});

$(document).ready(function(){
});

$('#txtProses').change(function(){
    let tipeProses = document.getElementById('txtProses').value;
    if(tipeProses === 'langsung'){
        $('#formWaktuProses').hide();
    }else{
        $('#formWaktuProses').show();
    }
});

function prosesKirimPesan()
{
    let judulPesan = divBroadcastPesan.judulPesan;
    let isiPesan = divBroadcastPesan.isiPesan;
    let tipeProses = divBroadcastPesan.tipeProses;
    let waktu = divBroadcastPesan.waktu;

    $('#divStatusBroadcast').show();
    $('#divTabelBroadcast').hide();
    $('#divFormTambahBroadcast').hide();
    $.post('broadcastPesan/prosesBroadcast',{'judulPesan':judulPesan, 'isiPesan':isiPesan, 'tipeProses': tipeProses, 'waktu':waktu}, function(data){
        let obj = JSON.parse(data);
        // console.log(obj);
        suksesKirim();
        renderMenu(broadcastPesan);
        divJudul.judulForm = "Broadcast Pesan";
    });
}

function suksesKirim()
{
    let tipeProses = divBroadcastPesan.tipeProses;
    let pesan = '';
    if(tipeProses == 'langsung'){
        pesan = 'Berhasil mengirimkan pesan broadcast ...';
    }else{
        pesan = 'Berhasil menjadwalkan pesan broadcast';
    }
    Swal.fire(
        'Sukses ..',
        pesan,
        'success'
      )
}

function hapusBroadcast(idPesan)
{
    Swal.fire({
        title: 'Hapus?',
        text: "Apakah kamu yakin ingin menghapus pesan broadcast?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText : 'Batal'
      }).then((result) => {
        if (result.value) {
           $.post('broadcastPesan/hapusPesan', {'idPesan':idPesan}, function(data){
               Swal.fire({
                title : 'Sukses..',
                text : 'Berhasil menghapus list broadcast pesan',
                icon : 'success'
               });
                renderMenu(broadcastPesan);
                divJudul.judulForm = "Broadcast Pesan";
           });
        }
      });
}