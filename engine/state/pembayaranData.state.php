<?php

class pembayaranData{
  
 private $st;

    public function __construct()
    {
      $this -> st = new state;
    }

    public function getKartuLaundry($kd)
    {
      $this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kd';");
      return $this -> st -> querySingle();
    }

    public function getItemCucian($kdRegistrasi)
    {
      $this -> st -> query("SELECT * FROM tbl_temp_item_cucian WHERE kd_room='$kdRegistrasi';");
      return $this -> st -> queryAll();
    }

    public function getNamaService($kdItem)
    {
      $this -> st -> query("SELECT nama FROM tbl_service WHERE kd_service='$kdItem' LIMIT 0,1;");
      return $this -> st -> querySingle();
    }

    public function jlhPromoCode($kd)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kd' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> numRow();
    }

    public function getPromo($kd)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kd' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> querySingle();
    }

    public function getTempCucian($kdService)
    {
      $this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kdService';");
      return $this -> st -> queryAll();
    }

    public function jlhPromo($kdPromo)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kdPromo' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> numRow();
    }

    public function qPromo($kdPromo)
    {
      $this -> st -> query("SELECT * FROM tbl_promo_code WHERE kd_promo='$kdPromo' AND aktif='y' LIMIT 0,1;");
      return $this -> st -> querySingle();
    }

    public function simpanPembayaran($kdTransaksi, $kdService, $waktu, $total, $diskonTotal, $kdPromo, $hargaAfterFiskonPromo, $tunai, $operator)
    {
      $qSimpanPembayaran = "INSERT INTO tbl_pembayaran VALUES(null,'$kdTransaksi','$kdService','$waktu','$total','$diskonTotal','$kdPromo','$hargaAfterFiskonPromo','$tunai','$operator');";
      $this -> st -> query($qSimpanPembayaran);
      $this -> st -> queryRun();
    }

    public function simpanArusKas($kdKas, $kdTransaksi, $asal, $arus, $hargaAfterFiskonPromo, $waktuTemp, $operator)
    {
      $qSimpanKeArusKas = "INSERT INTO tbl_arus_kas VALUES(null, '$kdKas', '$kdTransaksi', '$asal', '$arus', '$hargaAfterFiskonPromo', '$waktuTemp', '$operator');";
      $this -> st -> query($qSimpanKeArusKas);
      $this -> st -> queryRun();
    }

    public function updateStatusPembayaran($kdService)
    {
      $qUpdateStatus = "UPDATE tbl_kartu_laundry SET pembayaran='selesai' WHERE kode_service='$kdService';";
      $this -> st -> query($qUpdateStatus);
      $this -> st -> queryRun();
    }

    public function getUsernameKartuLaundry($kdService)
    {
      $this -> st -> query("SELECT pelanggan FROM tbl_kartu_laundry WHERE kode_service='$kdService';");
      return $this -> st -> querySingle();
    }

    public function getLevelPelanggan($usernamePelanggan)
    {
      $this -> st -> query("SELECT level FROM tbl_pelanggan WHERE username='$usernamePelanggan';");
      return  $this -> st -> querySingle();
    }

    public function getBonusCuci($levelPelanggan)
    {
      $this -> st -> query("SELECT bonus_point_cuci FROM tbl_level_user WHERE kd_level='$levelPelanggan';");
      return $this -> st -> querySingle();
    }

    public function getPoinPelanggan($usernamePelanggan)
    {
      $this -> st -> query("SELECT poin_real FROM tbl_pelanggan WHERE username='$usernamePelanggan';");
      return $this -> st -> querySingle();
    }

    public function updatePoinPelanggan($poinBaru, $usernamePelanggan)
    {
      $qUpdatePoint = "UPDATE tbl_pelanggan SET poin_real='$poinBaru' WHERE username='$usernamePelanggan';";
      $this -> st -> query($qUpdatePoint);
      $this -> st -> queryRun();
    }

    public function updateTimeLine($kdTimeline, $kdService, $waktu, $operator)
    {
      $qUpdateTimeline = "INSERT INTO tbl_timeline VALUES(null, '$kdTimeline','$kdService','$waktu','$operator','pembayaran_selesai','Pembayaran telah dilakukan');";
      $this -> st -> query($qUpdateTimeline);
      $this -> st -> queryRun();
    }

    public function detailPembayaran($kdTransaksi)
    {
      $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE kd_pembayaran='$kdTransaksi';");
      return $this -> st -> querySingle();
    }
    
    public function getDataPelangganBind($pelanggan)
    {
      $this -> st -> query("SELECT nama_lengkap, email, hp, level FROM tbl_pelanggan WHERE username='$pelanggan';");
      return $this -> st -> querySingle();
    }
  
    public function diskonLevelBind($level)
    {
      $this -> st -> query("SELECT diskon_cuci FROM tbl_level_user WHERE kd_level='$level';");
      return $this -> st -> querySingle();
    }
  

}