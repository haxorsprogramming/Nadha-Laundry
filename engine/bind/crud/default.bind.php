<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=HOMEBASE; ?>ladun/default/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
      
    <title>Crud Example</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Hind+Madurai&display=swap');
      body{
        font-family: 'Hind Madurai', sans-serif;
      }
    </style>
  </head>
  <body>
  <div class="container" style="padding-top:12px;">
 <h3>Crud Example Apps</h3> <a href="<?=HOMEBASE; ?>">Back to home</a><br/><br/>
 <h5>Haxors Programming Club</h5>
 Download database <a href='<?=HOMEBASE; ?>ladun/default/database/dbs_mahasiswa.sql'>disini</a> 
 <hr/>
 <br/>
 <div class="row">
   <button class="btn btn-primary" id='btnTambah'>Tambah Mahasiswa</button>
 </div>
  <div class="row" style="padding-top:30px;">
  Data Mahasiswa<br/>
  
   </div>
   <div  id='divTampilMahasiswa' class="row">
    
  </div>
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function(){

        $.post('crud/tampilMahasiswa',{},function(data){
          $('#divTampilMahasiswa').html(data);
        });

        $('#btnTambah').click(function(){
           $('#divTampilMahasiswa').load('crud/tambahData');
        });

       
    });
    </script>

  </body>
</html>
