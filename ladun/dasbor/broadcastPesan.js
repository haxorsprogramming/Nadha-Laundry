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
            prosesKirimPesan();
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
    Swal.fire(
        'Sukses ..',
        'Berhasil mengirimkan pesan broadcast ...',
        'success'
      )
}