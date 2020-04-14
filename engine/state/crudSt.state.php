<?php

class crudSt{
  
 private $tbl = 'tbl_mahasiswa';
 private $st;

  public function __construct()
  {
   $this -> st = new state;
  }

  public function mhsDataAll()
  {
   $this -> st -> query(DB_SELECT."* FROM " . $this -> tbl);
   return $this -> st -> queryAll();
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

  public function mhsDetail($nim)
  {
  	$this -> st -> query(DB_SELECT." * FROM ". $this -> tbl." WHERE nim='$nim';");
  	return $this -> st -> querySingle();
  }

   public function tambahData($data)
  {
    $query = DB_INSERT.$this -> tbl ." VALUES (null,:nim,:nama,:email,:jurusan,:alamat);";
    $this -> st -> query($query);
    $this -> st -> querySet('nim',$data['nim']);
    $this -> st -> querySet('nama',$data['nama']);
    $this -> st -> querySet('email',$data['email']);
    $this -> st -> querySet('jurusan',$data['jurusan']);
    $this -> st -> querySet('alamat',$data['alamat']);
    $this -> st -> queryRun();    
    
  }

  public function deleteData($nim)
  {
    $query = "DELETE FROM tbl_mahasiswa WHERE nim=:nim";
    $this -> st -> query($query);
    $this -> st -> querySet('nim',$nim);
    $this -> st -> queryRun();  
  }
  
  public function dataMhsAll()
  {
    return $this -> st -> querySingle();
  }


}
