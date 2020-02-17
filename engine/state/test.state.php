<?php

class test{
  
 
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  
  function updateData($data)
  {
    $query = DB_UPDATE." tbl_mahasiswa SET nim=:nim, nama=:nama, email=:email, jurusan=:jurusan, alamat=:alamat WHERE nim=:nim";
    $this -> st -> query($query);
    $this -> st -> querySet('nim',$data['nim']);
    $this -> st -> querySet('nama',$data['nama']);
    $this -> st -> querySet('email',$data['email']);
    $this -> st -> querySet('jurusan',$data['jurusan']);
    $this -> st -> querySet('alamat',$data['alamat']);
    $this -> st -> queryRun();     
  }

    function buatTabel()
    {
        $query = "CREATE TABLE tbl_payment (id int AUTO_INCREMENT, token varchar(255), id_trans varchar(255), rec_id varchar(255), waktu TIMESTAMP, Age int, PRIMARY KEY(id));";
        $this -> st -> query($query);
        $this -> st -> queryRun();
        
    }

}
