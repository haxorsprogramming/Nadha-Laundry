<?php

class Home extends Route{
    
    public function index(){       
        $this -> bind('/home/default');
    }  
   
    public function dataMahasiswa()
    {
        $data['mhs'] = $this -> state('homeSt') -> mhsData();
        
        $this -> bind('/home/dataBind',$data);
    }

  
    public function detailMhs($nim)
    {
        $data['mhs'] = $this -> state('homeSt') -> mhsDetail($nim);
        $this -> bind('/home/dataDetail',$data);
    }

    public function tambah()
    {
        $data['nim'] = '0701163114';
        $data['nama'] = 'Aditia Darma';
        $data['email'] = 'alditha.forum@gmail.com';
        $this -> state('homeSt') -> tambahData();
    }

    public function proTambahData()
    {
        $data['nim'] = $this -> inputPost('txtNim');
        $data['nama'] = $this -> inputPost('txtNama');
        $data['email'] = $this -> inputPost('txtEmail');
        $this -> state('homeSt') -> tambahData($data);
        $this -> toSite('home/formTambah');
    }

    public function formTambah()
    {
        $this -> bind('/home/formTambah');
    }

    public function kontak()
    {
        $this -> bind ('/home/kontak');
    }

    
 
    
}
