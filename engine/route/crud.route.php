<?php

class crud extends Route{


public function index()
{
	$this -> bind('/crud/default');
}

public function tampilMahasiswa()
{
	$data['mhs'] = $this -> state('crudSt') -> mhsDataAll();
	$this -> bind('/crud/tampilData',$data);
}

public function tambahData()
{
	$this -> bind('/crud/formTambahData');
}

public function proTambahData()
{
	$data['nim'] = $this -> inp('nim');
	$data['nama'] = $this -> inp('nama');
	$data['email'] = $this -> inp('email');
	$data['alamat'] = $this -> inp('alamat');
	$data['jurusan'] = $this -> inp('jurusan');
	$this -> state('crudSt') -> inp($data);
}

public function proUpdateData()
{
	$data['nim'] = $this -> inp('nim');
	$data['nama'] = $this -> inp('nama');
	$data['email'] = $this -> inp('email');
	$data['alamat'] = $this -> inp('alamat');
	$data['jurusan'] = $this -> inp('jurusan');
	$this -> state('crudSt') -> inp($data);

}

public function formEdit()
{
	$nim = $this -> inp('nim');
	$data['mhsDetail'] = $this -> state('crudSt') -> mhsDetail($nim);
	$this -> bind('crud/formEdit', $data);
}

public function proDeleteData()
{
	$nim = $this -> inp('nim');
	$this -> state('crudSt') -> deleteData($nim);
}
	
	public function tesCariBaris()
	{
		$nim = $this -> inp('nim');
	}
	
	public function hitungBaris($namaTabel)
	{
		
	}


}
