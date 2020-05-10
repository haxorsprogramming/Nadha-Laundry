$(document).ready(function(){
    document.getElementById('txtValue').focus();
});
//yunia riska dewi
var divFormEditPengaturan = new Vue({
    el : '#divFormEditPengaturan',
    data : {
        kdSetting : '',
        caption : '',
        value : ''
    },
    methods : {
        simpanAtc : function(){
            let kdSetting = document.getElementById('txtKdSetting').innerHTML;
            let caption = document.getElementById('txtCaption').innerHTML;
            let value = document.getElementById('txtValue').value;
            this.kdSetting = kdSetting;
            this.caption = caption;
            this.value = value;
            if(kdSetting === '' || caption === '' || value === ''){
                errorIisi();
            }else{
                $.post('pengaturanUmum/prosesEditPengaturan',{'kdSetting' : this.kdSetting, 'caption': caption, 'value': value}, function(data){
                    let obj = JSON.parse(data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data pengaturan berhasil di update'
                      });
                    renderMenu(pengaturanUmum);
                    divJudul.judulForm = "Pengaturan Laundry";
                });
            }
           
        }
    }
});

function errorIisi(){
    Swal.fire({
        icon : 'error',
        title : 'Isi field',
        text : 'Harap isi field ...'
    });
    document.getElementById('txtValue').focus();
}