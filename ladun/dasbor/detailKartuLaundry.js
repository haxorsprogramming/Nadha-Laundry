var divDetailKartuLaundry = new Vue({
    el : '#divDetailKartuLaundry',
    data : {

    },
    methods : {
        bayarAtc : function(){
            window.alert("halo");
        },
        keLaundryRoomAtc : function(kdService){
            window.alert(kdService);
        },
        pickUpAtc : function(kdService){
            setDiambil(kdService);
            // $.post('kartuLaundry/pickUpCucian',{'kdService':kdService}, function(data){
            //     let obj = JSON.parse(data);
            //     divJudul.judulForm = "Detail Cucian";
            // $('#divUtama').html("Memuat ...");
            // $('#divUtama').load('laundryRoom/detailCucian',{'kd':kdService});
            // });
        }
    }
});

function setDiambil(kdService){
    iziToast.question({
        timeout: false,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Set selesai',
        message: 'Set cucian ke status sudah selesai?',
        position: 'center',
        buttons: [
            ['<a href="#!" class="btn btn-warning"><i class="fas fa-check"></i><b> Ya</b></a>', function (instance, toast) {
                $('#btnPickUp').addClass('disabled');
                 $.post('kartuLaundry/pickUpCucian',{'kdService':kdService}, function(data){
                    let obj = JSON.parse(data);
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    konfirmasiPickUpCucian(kdService);
                });
            }],
            ['<a href="#!" class="btn btn-warning"><i class="fas fa-times"></i><b> Tidak</b></a>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ]
    });
}

function konfirmasiPickUpCucian(kdService)
{
    iziToast.info({
        title: "Cucian diambil..",
        message: "Cucian telah di-set ke status diambil. Seluruh proses telah selesai...",
        position: "topCenter",
        timeOut: false,
        pauseOnHover: false,
        onClosed: function() {
            divJudul.judulForm = "Detail Cucian";
                $('#divUtama').html("Memuat ...");
                $('#divUtama').load('kartuLaundry/detailKartuLaundry/'+kdService);
        }
      });
}