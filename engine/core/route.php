<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
/**
* Uinsu Web Framework
* Small, Fast, & Secure Web Framework
* Based on PHP
* Thanks for support
* Muhammad Ikhsan, ST. M.Kom (Pembina Haxors Programming Club)
* Muhammad Furqan, S.Si, Sc, M.Comp (Ketua Prodi Ilmu Komputer UINSU)
* 
* @package	Uinsu Web Framework
* @author	Haxors Programming Club
* @link	https://haxors.or.id
* @since	Version 3.5
*/

class Route{
    
    public function bind($blade, $data = [])
    {
        require_once 'engine/bind/'.$blade.'.bind.php';    
    }

    public function state($state)
    {
        require_once 'engine/state/'.$state.'.state.php';
        return new $state;
    }
    //membuat string random(panjang_string)
    public function rnstr($length)
    {
        $bahan = 'qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM';
        $acak = str_shuffle($bahan);
        $hasil = substr($acak,0,$length);
        echo $hasil;
        //var_dum("Data");
    }        
    //fungsi upload
    public function upload($path)
    {
        $data['path'] = $data -> path($path);
        if(move_uploaded_file()){
        
        }else{
        
        }
    }
    //ambil data post
    public function inp($id)
    {
        $id = $_POST[$id];
        return $id;
    }
    //ambil data get
    public function ing($id)
    {
        $id = $_POST[$id];
        return $id;
    }
    //fungsi untuk membuat session
    public function setses($id, $val)
    {
        $_SESSION[$id] = $val;
    }
    //fungsi untuk mengambil session
    public function getses($id)
    {
      return $_SESSION[$id];
    }
    //fungsi untuk menghapus seluruh sesi
    public function destses()
    {
      session_destroy();
    }
  
    public function goTo($page)
    {
      header("Location:".$page);
      exit();
    }
  
    public function emck($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo("true");
        } else {
          echo("false");
        }
    }
    
}
