document.getElementById('txtUsername').focus();

var divFormTambahUser = new Vue({
    el : '#divFormTambahUser',
    data : {
        username : '',
        password : '',
        tipeUser : ''
    },
    methods: {
        simpanAtc : function(){
            let username = document.getElementById('txtUsername').value;
            let password = document.getElementById('txtPassword').value;
            let tipe = document.getElementById('txtTipe').value;
            if(username === '' || password === ''){
                errorIsi();
                document.getElementById('txtUsername').focus();
            }else{
                this.username = username;
                this.password = password;
                this.tipeUser = tipe;
                prosesTambah();
            }
        }
    }
});

function prosesTambah(){
    $('#btnSimpan').addClass('disabled');
    let username = divFormTambahUser.username;
    let password = divFormTambahUser.password;
    let tipeUser = divFormTambahUser.tipeUser;

    $.post('manajemenUser/prosesTambahUser',{'username':username, 'password':password, 'tipeUser':tipeUser},function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'sukses'){
            suksesSimpan();
        }else{
            errorSimpan();
        }
    });
}

function errorIsi()
{
    Swal.fire({
        'title':'Error ..',
        'text':'Harap isi semua field !!!',
        'icon':'error',
        'position':'top'
    });
}

function suksesSimpan()
{
    Swal.fire(
        'Sukses ..',
        'Buat user baru berhasil..',
        'success'
      );
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('manajemenUser');
      divJudul.judulForm = "Manajemen User";
}

function errorSimpan()
{
    Swal.fire(
        'Error ..',
        'Username sudah digunakan !!!, harap periksa kembali.',
        'error'
      );
      $('#btnSimpan').removeClass('disabled');
}