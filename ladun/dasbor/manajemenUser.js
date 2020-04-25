var divTabelPelanggan = new Vue({
    el : '#divTabelPelanggan',
    data : {
        listUser : []
    },
    methods : {
        tambahUserAtc : function (){
            divJudul.judulForm = "Tambah user baru";
            $('#divUtama').load('manajemenUser/formTambahUser');
        },
        hapusAtc : function(username){
            konfirmasiHapus(username);
        }
    }
});
//render user pertama kali di load 
$.post('manajemenUser/getListUser',function(data){
    let obj = JSON.parse(data);
    obj.forEach(pushTableItem);
        function pushTableItem(item, index){
            divTabelPelanggan.listUser.push({
                username : obj[index].username,
                tipeUser : obj[index].tipeUser, 
                lastLogin :  obj[index].lastLogin,
            });
        }
    setTimeout(renderTabel, 10);

});

function konfirmasiHapus(username){
    Swal.fire({
        title: 'Hapus?',
        text: "Apakah kamu yakin ingin menghapus user "+username+" ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText : 'Batal'
      }).then((result) => {
        if (result.value) {
            $.post('manajemenUser/hapusUser',{'username':username}, function(data){
                berhasilHapus();
                $('#divUtama').html("Memuat ...");
                $('#divUtama').load('manajemenUser');
            });
        }
      })
}

function berhasilHapus()
{
    Swal.fire(
        'Sukses ..',
        'Berhasil menghapus user ...',
        'success'
      )
}

function renderTabel()
{
    $('#tblUser').DataTable();
}

