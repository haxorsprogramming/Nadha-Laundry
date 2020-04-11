<?php

class utility extends Route{

    public function __construct()
    {
    $this -> st = new state;
    
    }

    public function getInfoLaundry()
    {   
        // nama laundry
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='laundry_name' LIMIT 0,1;");
        $qNamaLaundry = $this -> st -> querySingle();
        $data['namaLaundry'] = $qNamaLaundry['value'];
        // alamat
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='address' LIMIT 0,1;");
        $qAlamatLaundry = $this -> st -> querySingle();
        $data['alamatLaundry'] = $qAlamatLaundry['value'];
        //kota 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='kota' LIMIT 0,1;");
        $qKotaLaundry = $this -> st -> querySingle();
        $data['kotaLaundry'] = $qKotaLaundry['value'];
        //kabupaten 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='kabupaten' LIMIT 0,1;");
        $qKabupatenLaundry = $this -> st -> querySingle();
        $data['kabupatenLaundry'] = $qKabupatenLaundry['value'];
        //provinsi 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='provinsi' LIMIT 0,1;");
        $qProvinsiLaundry = $this -> st -> querySingle();
        $data['provinsiLaundry'] = $qProvinsiLaundry['value'];
        //kode post 
        $this -> st -> query("SELECT value FROM tbl_setting_laundry WHERE kd_setting='kode_pos' LIMIT 0,1;");
        $qKodePosLaundry = $this -> st -> querySingle();
        $data['kodePosLaundry'] = $qKodePosLaundry['value'];
        $this -> toJson($data);
    }

    public function getInfoPelanggan()
    {
        
    }

}
