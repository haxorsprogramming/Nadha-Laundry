<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
//import library php mailer (untuk mengirimkan email)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'lib/phpmailer/library/PHPMailer.php';
require_once 'lib/phpmailer/library/Exception.php';
require_once 'lib/phpmailer/library/OAuth.php';
require_once 'lib/phpmailer/library/POP3.php';
require_once 'lib/phpmailer/library/SMTP.php';
//import library aws (untuk kebutuhan serverless)
require 'lib/aws-master/src/Aws.php';
//import library firebase (coming soon)

class Route{
    //fungsi bind (memasukkan view ke dalam controller)
    public function bind($blade, $data = [])
    {
        require_once 'engine/bind/'.$blade.'.bind.php';
    }
    //fungsi state (memasukkan model ke dalam controller)
    public function state($state)
    {
        require_once 'engine/state/'.$state.'.state.php';
        return new $state;
    }
    //membuat string random dengan parameter(jumlah)
    public function rnstr($length)
    {
        $bahan  = 'qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM';
        $acak   = str_shuffle($bahan);
        $hasil  = substr($acak,0,$length);
        return $hasil;
    }
    //membuat int random dengan parameter(jumlah)
    public function rnint($length)
    {
      $bahan  = '123456789012345678901234567890123456780';
      $acak   = str_shuffle($bahan);
      $hasil  = substr($acak, 0, $length);
      return $hasil;
    }
    //hash password 
    public function hashPassword($pass)
    {
      return password_hash($pass, PASSWORD_DEFAULT);
    }
    //verify password 
    public function verifPassword($pass_1, $pass_2)
    {
        //pass 1 = string awal
        //pass 2 = string hash
        if (password_verify($pass_1, $pass_2)) {
          return true;
        } else {
          return false;
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
    //fungsi ambil temp file
    public function getTempFile($id)
    {
      return $_FILES[$id]['tmp_name'];
    }
    //fungsi untuk ambil filename 
    public function getNameFile($id)
    {
      return $_FILES[$id]["name"];
    }
    //fungsi untuk ambil tipe file
    public function getTypeFile($id)
    {
      $bex = explode(".", $id);
      return $bex[1];
    }
    //fungsi untuk ambil size file 
    public function getSizeFile($id)
    {
      return $_FILES[$id]['size'];
    }
    //fungsi untuk upload file 
    public function uploadFile($source, $destination)
    {
      if(move_uploaded_file($source, $destination)){      
      }
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
    //fungsi untuk redirect halaman
    public function goto($page)
    {
      header("Location:".$page);
      exit();
    }
    //fungsi untuk cek validasi format email
    public function emck($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          return true;
        } else {
          return false;
        }
    }
    //fungsi untuk cek sesi
    public function cekSesi($ses)
    {
      if(!ISSET($_SESSION[$ses])){
        return 'false';
      }else{
        return 'true';
      }
    }
    //fungsi ubah string ke json via echo
    public function toJson($data)
    {
      echo json_encode($data);
    }
    //fungsi untuk cek user login 
    public function cekUserLogin($ses,$page){
      if(!ISSET($_SESSION[$ses])){
        header("Location:".HOMEBASE.$page);
        die();
      }else{
      }
    }
    //ambil data waktu full
    public function waktu()
    {
      return date("Y-m-d H:i:s");
    }
    //ambil data tanggal full (tahun-bulan-tanggal)
    public function tanggal()
    {
      return date("Y-m-d");
    }
    //fungsi untuk ambil jumlah jarak antara 2 tanggal
    function jarakTanggal( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {
      $dates    = array();
      $current  = strtotime( $first );
      $last     = strtotime( $last );
      while( $current <= $last ) {
        $dates[] = date( $format, $current );
        $current = strtotime( $step, $current );
      }
      return $dates;
    }
    //fungsi untuk mengambil jumlah hari dalam satu bulan
    public function ambilHari($bulan)
    {
      $tahun = date('Y');
      return cal_days_in_month(CAL_GREGORIAN,$bulan,2019);
    }
    //array bulan normal
    public function getListBulanInt()
    {
      $dataList = ['01','02','03','04','05','06','07','08','09','10','11','12'];
      return $dataList;
    }
    //fungsi untuk merubah desimal angka ke tanggal
    public function getTanggalBedaDigit($tanggal)
    {
      $dataList = ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34'];
      $dataSend = $dataList[$tanggal];
      return $dataSend;
    }
    //conversi bulan angka ke huruf
    public function bulanIndo($bulan)
    {
      switch ($bulan){
        case "01":
          return 'Januari';
        break;
        case "02": 
          return 'Februari';
        break;
        case "03": 
          return 'Maret';
        break;
        case "04": 
          return 'April';
        break;
        case "05": 
          return 'Mei';
        break;
        case "06": 
          return 'Juni';
        break;
        case "07": 
          return 'Juli';
        break;
        case "08": 
          return 'Agustus';
        break;
        case "09": 
          return 'September';
        break;
        case "10": 
          return 'Oktober';
        break;
        case "11": 
          return 'November';
        break;
        case "12": 
          return 'Desember';
        break;
      }
    }
    //konversi bulan huruf ke angka
    public function bulanToInt($bulan)
    {
      switch ($bulan){
        case 'januari': 
          return '01';
        case 'februari': 
          return '02';
        case 'maret': 
          return '03';
        case 'april': 
          return '04';
        case 'mei': 
          return '05';
        case 'juni': 
          return '06';
        case 'juli': 
          return '07';
        case 'agustus': 
          return '08';
        case 'september': 
          return '01';
        case 'oktober': 
          return '10';
        case 'november': 
          return '11';
        case 'desember': 
          return '12';
      }
    }
    //fungsi kirim email
    public function kirimEmail($nama,$penerima,$judul,$isi,$emailHost,$passwordHost)
    {
        $mail = new PHPMailer(false);  
        try {
            //Server settings
            $mail->SMTPDebug  = 0;                                  // Enable verbose debug output
            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                               // Enable SMTP authentication
            $mail->Username   = $emailHost;                         // SMTP username
            $mail->Password   = $passwordHost;                      // SMTP password
            $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                      // TCP port to connect to
            //Recipients
            $mail->setFrom($emailHost, 'Haxors Uinsu');
            $mail->addAddress($penerima, $nama);                    // Add a recipient
            //Content
            $mail->isHTML(true);                                    // Set email format to HTML
            $mail->Subject = $judul;
            $mail->Body    = $isi;
            $mail->AltBody = $isi;

            $mail->send();
            return 'sukses';
        } catch (Exception $e) {
          return 'error';
        }
    }
    //fungsi xss filter data
    public function xss_filter($data)
    {
    // Fix &entity\n;
    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do
    {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    }
    while ($old_data !== $data);
    // we are done...
    return $data;
    }
    //send notifikasi cucian selesai
    public function cucianSelesaiNotif($message, $phone_no, $apiKey){
        $message = preg_replace( "/(\n)/", "<ENTER>", $message );
        $message = preg_replace( "/(\r)/", "<ENTER>", $message );
        
        $phone_no = preg_replace( "/(\n)/", ",", $phone_no );
        $phone_no = preg_replace( "/(\r)/", "", $phone_no );
        
        $data = array("phone_no" => $phone_no, "key" => $apiKey, "message" => $message);
        $data_string = json_encode($data);
        $ch = curl_init('http://116.203.92.59/api/send_message');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
    }
    //fungsi broadcast pesan
    public function broadcastPesan($message, $phone_no, $apiKey)
    {
      $message = preg_replace( "/(\n)/", "<ENTER>", $message );
      $message = preg_replace( "/(\r)/", "<ENTER>", $message );
      
      $phone_no = preg_replace( "/(\n)/", ",", $phone_no );
      $phone_no = preg_replace( "/(\r)/", "", $phone_no );
      
      $data = array("phone_no" => $phone_no, "key" => $apiKey, "message" => $message);
      $data_string = json_encode($data);
      $ch = curl_init('http://116.203.92.59/api/send_message');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_VERBOSE, 0);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
      curl_setopt($ch, CURLOPT_TIMEOUT, 15);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data_string))
      );
      $result = curl_exec($ch);
    }

}