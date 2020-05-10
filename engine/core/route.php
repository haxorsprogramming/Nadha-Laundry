<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'lib/phpmailer/library/PHPMailer.php';
require_once 'lib/phpmailer/library/Exception.php';
require_once 'lib/phpmailer/library/OAuth.php';
require_once 'lib/phpmailer/library/POP3.php';
require_once 'lib/phpmailer/library/SMTP.php';

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
        return $hasil;
        //var_dum("Data");
    }

    public function rnint($length)
    {
      $bahan = '123456789012345678901234567890123456780';
      $acak = str_shuffle($bahan);
      $hasil = substr($acak, 0, $length);
      echo $hasil;
    }

    //fungsi upload
    public function upload($path)
    {
        // $data['path'] = $data -> path($path);
        // if(move_uploaded_file()){

        // }else{

        // }
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

    public function goto($page)
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

    public function cekSesi($ses)
    {
      if(!ISSET($_SESSION[$ses])){
        return 'false';
      }else{
        return 'true';
      }
    }

    public function toJson($data)
    {
      echo json_encode($data);
    }

    public function cekUserLogin($ses){
      if(!ISSET($_SESSION[$ses])){
        header("Location:".HOMEBASE.'login');
        die();
      }else{
      }
    }

    public function waktu()
    {
      return date("Y-m-d H:i:s");
    }

    function jarakTanggal( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {
      $dates = array();
      $current = strtotime( $first );
      $last = strtotime( $last );
      while( $current <= $last ) {
        $dates[] = date( $format, $current );
        $current = strtotime( $step, $current );
      }
      return $dates;
    }

    public function ambilHari($bulan)
    {
      $tahun = date('Y');
      return cal_days_in_month(CAL_GREGORIAN,$bulan,2019);
    }

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

    public function kirimEmail($penerima,$judul,$isi)
    {
        $mail = new PHPMailer(false);  
        // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'haxorsuinsu@gmail.com';                 // SMTP username
            $mail->Password = 'python2019!';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('haxorsuinsu@gmail.com', 'Haxors Uinsu');
            $mail->addAddress($penerima, 'Aditia Darma Nst');     // Add a recipient
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $judul;
            $mail->Body    = $isi;
            $mail->AltBody = $isi;

            $mail->send();
            return 'sukses';
        } catch (Exception $e) {
          return 'error';
        }
    }

}